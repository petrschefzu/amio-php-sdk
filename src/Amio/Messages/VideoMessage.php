<?php

namespace MYPS\Amio\Messages;

/**
 * Class VideoMessage
 */
final class VideoMessage implements MessageInterface
{

    /**
     * Video url.
     *
     * @var string
     */
    private $_url;


    /**
     * Message constructor.
     *
     * @param string $url Video url.
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
        return MessageEnum::VIDEO;

    }//end getType()


}//end class
