<?php

namespace MYPS\Amio\WebHooks\Types;

abstract class AbstractMessage
{
    /**
     * @var string
     */
    protected $_channelId;

    /**
     * @var string
     */
    protected $_contactId;

    /**
     * AbstractMessage constructor.
     *
     * @param string $channelId
     * @param string $contactId
     */
    protected function __construct(string $channelId, string $contactId)
    {
        $this->_channelId = $channelId;
        $this->_contactId = $contactId;

    }//end __construct()

    /**
     * @return string
     */
    public function getChannelId(): string
    {
        return $this->_channelId;

    }//end getChannel()

    /**
     * @return string
     */
    public function getContactId(): string
    {
        return $this->_contactId;

    }//end getContact()

    public abstract function getType(): string;

    public abstract static function createFromRequest(array $data);


}//end class