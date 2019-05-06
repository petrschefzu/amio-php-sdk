<?php

namespace MYPS\Amio\WebHooks;


use MYPS\Amio\Exceptions\HandlerNotFoundException;
use MYPS\Amio\Exceptions\UnsupportedEventTypeException;
use MYPS\Amio\Exceptions\UnsupportedRequestSourceException;
use MYPS\Amio\Security\XHubSignature;
use MYPS\Amio\WebHooks\Types\Enum;

class WebHookHandler
{
    /**
     * @var bool
     */
    private $_xHubEnabled;

    /**
     * @var array
     */
    private $_secrets;

    /**
     * @var array
     */
    private $_handlers;

    /**
     * WebHookHandler constructor.
     *
     * @param bool $xHubEnabled
     * @param array $secrets
     */
    public function __construct(bool $xHubEnabled, array $secrets = [])
    {
        if ($xHubEnabled === true && empty($secrets)) {
            throw new \InvalidArgumentException("Secret key is required");
        }

        $this->_xHubEnabled = $xHubEnabled;
        $this->_secrets = $secrets;

    }//end __construct()


    /**
     * Handle request from Amio
     *
     * @param string $requestBody
     * @param array $requestHeaders
     *
     * @throws UnsupportedRequestSourceException
     * @throws UnsupportedEventTypeException
     * @throws HandlerNotFoundException
     */
    public function handle(string $requestBody, array $requestHeaders)
    {
        if ($this->isRequestValid($requestBody, $requestHeaders["X-Hub-Signature"])) {
            throw new UnsupportedRequestSourceException("Server which created call to your api is not supported.");
        }

        $data = json_decode($requestBody, true);
        $eventType = $data['event'];

        if ($this->isEventSupported($eventType) === false) {
            throw new UnsupportedEventTypeException("Event type {$eventType} is not supported.");
        }

        if (empty($this->_handlers[$eventType])) {
            throw new HandlerNotFoundException("Handler for event type {$eventType} is not added.");
        }

        /** @var WebHookHandlerInterface $handler */
        foreach ($this->_handlers[$eventType] as $handler) {
            $handler->handleWebhook($data);
        }

    }//end handle()

    /**
     * Check if request is valid and can be invoked
     *
     * @param string $requestBody
     * @param string $signature
     * @return bool
     */
    private function isRequestValid(string $requestBody, string $signature): bool
    {
        if ($this->_xHubEnabled === false) {
            return true;
        }

        $channelId = self::getChannelId($requestBody);

        if ($channelId === '' || !isset($this->_secrets[$channelId])) {
            return false;
        }

        if (XHubSignature::isValid($this->_secrets[$channelId], $requestBody, $signature) === false) {
            return false;
        }

        return true;

    }//end isRequestValid()

    /**
     * Get channel id if exists else return empty string
     *
     * @param string $requestBody
     * @return string
     */
    private static function getChannelId(string $requestBody): string
    {
        $json = json_decode($requestBody, true);

        return isset($json['data']['channel']['id']) ? $json['data']['channel']['id'] : '';

    }//end getChannelId()

    /**
     * Add handler to handler stack
     *
     * @param string $eventType
     * @param WebHookHandlerInterface $handler
     */
    public function addHandler(string $eventType, WebHookHandlerInterface $handler): void
    {
        if (!isset($this->_handlers[$eventType])) {
            $this->_handlers[$eventType] = [];
        }

        $this->_handlers[$eventType][] = $handler;
    }

    /**
     * Handle message failed webhook
     *
     * @param WebHookHandlerInterface $handler
     */
    public function onMessageFailed(WebHookHandlerInterface $handler): void
    {
        $this->addHandler(Enum::MESSAGE_FAILED, $handler);

    }//end onMessageReceived()

    /**
     * Handle message delivered webhook
     *
     * @param WebHookHandlerInterface $handler
     */
    public function onMessagesDelivered(WebHookHandlerInterface $handler): void
    {
        $this->addHandler(Enum::MESSAGE_DELIVERED, $handler);

    }//end onMessagesDelivered()

    /**
     * @param string $eventType
     *
     * @return bool
     */
    private function isEventSupported(string $eventType): bool
    {
        $className = self::getEventClassName($eventType);
        return class_exists($className);

    }//end

    /**
     * @param string $eventType
     * @return string
     */
    private static function getEventClassName(string $eventType): string
    {
        $className = explode('_', $eventType);
        return "MYPS\\Amio\\Webhooks\\Types\\" . ucfirst($className[0]) . ucfirst($className[1]);

    }//end getEventClassName()


}//end class