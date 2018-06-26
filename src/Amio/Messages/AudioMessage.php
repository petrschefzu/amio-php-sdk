<?php

namespace MYPS\Amio\Messages;

/**
 * Class AudioMessage
 */
final class AudioMessage implements MessageInterface
{

    /**
     * Audio url.
     *
     * @var string
     */
    private $_url;


    /**
     * Message constructor.
     *
     * @param string $url Audio url.
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
        return MessageEnum::AUDIO;

    }//end getType()


}//end class
