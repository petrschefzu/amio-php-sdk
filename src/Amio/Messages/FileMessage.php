<?php

namespace MYPS\Amio\Messages;

/**
 * Class FileMessage
 */
final class FileMessage implements MessageInterface
{

    /**
     * File url.
     *
     * @var string
     */
    private $_url;


    /**
     * Message constructor.
     *
     * @param string $url File url.
     */
    public function __construct(string $url)
    {
        $this->_url = $url;

    }//end __construct()


    /**
     * Get message data in expected structure.
     *
     * @return array
     */
    public function getContent(): array
    {
        return [
            'type'    => self::getType(),
            'payload' => [
                'url' => $this->_url,
            ]
        ];

    }//end getContent()


    /**
     * Return type of message.
     *
     * @return string
     */
    public function getType(): string
    {
        return MessageEnum::FILE;

    }//end getType()


}//end class
