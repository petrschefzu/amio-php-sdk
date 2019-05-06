<?php

namespace MYPS\Amio\WebHooks\Types;

final class MessageFailed extends AbstractMessage
{

    /**
     * @var string
     */
    private $_messageId;

    /**
     * @var array
     */
    private $_error;

    /**
     * MessageFailed constructor.
     *
     * @param string $channelId
     * @param string $contactId
     * @param string $messageId
     * @param array $error
     */
    protected function __construct(string $channelId, string $contactId, string $messageId, array $error)
    {
        parent::__construct($channelId, $contactId);
        $this->_messageId = $messageId;
        $this->_error = $error;

    }//end __construct()

    /**
     * @return string
     */
    public function getMessageId(): string
    {
        return $this->_messageId;

    }//end getMessage()

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->_error['code'];

    }//end getErrorCode()

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->_error['message'];

    }//end getError()

    /**
     * @return string
     */
    public function getType(): string
    {
        return Enum::MESSAGE_FAILED;

    }//end getType()

    /**
     * @param array $data
     *
     * @return MessageFailed
     */
    public static function createFromRequest(array $data)
    {
        $channelData = $data['data']['channel'];
        $contactData = $data['data']['contact'];

        return new self($channelData['id'], $contactData['id'], $data['data']['message']['id'], $data['data']['error']);

    }//end createFormRequest()


}//end class