<?php

namespace MYPS\Amio\Messages\Types;

use MYPS\Amio\Messages\Types\Structure\Message;

/**
 * Class FileMessage
 */
final class Structure implements MessageInterface
{

    private $_messages;

    public function __construct()
    {
        $this->_messages = [];
    }

    /**
     * Get message data in expected structure.
     *
     * @return array
     */
    public function getContent(): array
    {
        return [
            'type' => self::getType(),
            'payload' => self::getPayload(),
        ];

    }//end getContent()

    /**
     * Add structured message
     *
     * @param Message $message
     */
    public function addStructure(Message $message)
    {
        $this->_messages[] = $message;

    }//end addStructure()

    /**
     * Return type of message.
     *
     * @return string
     */
    public function getType(): string
    {
        return Enum::STRUCTURE;

    }//end getType()

    /**
     * Return type of message.
     *
     * @return array
     */
    private function getPayload()
    {
        if (count($this->_messages) === 1) {
            return $this->_messages[0]->getContent();
        }

        $payload = [];
        foreach ($this->_messages as $message) {
            $payload[] = $message->getContent();
        }

        return $payload;

    }//end getPayload()


}//end class
