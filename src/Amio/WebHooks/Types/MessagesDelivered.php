<?php

namespace MYPS\Amio\WebHooks\Types;

final class MessagesDelivered extends AbstractMessage
{
    /**
     * @var array
     */
    private $_messages;

    /**
     * MessagesDelivered constructor.
     *
     * @param string $channelId
     * @param string $contactId
     * @param array $messages
     */
    protected function __construct(string $channelId, string $contactId, array $messages)
    {
        parent::__construct($channelId, $contactId);
        $this->_messages = $messages;

    }//end __construct()

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return $this->_messages;

    }//end getMessages()

    /**
     * @return string
     */
    public function getType(): string
    {
        return Enum::MESSAGE_DELIVERED;

    }//end getType()

    /**
     * @param array $data
     * @return MessagesDelivered
     */
    public static function createFromRequest(array $data)
    {
        $channelData = $data['data']['channel'];
        $contactData = $data['data']['contact'];

        return new self($channelData['id'], $contactData['id'], $data['data']['messages']);

    }//end createFormRequest()


}//end class