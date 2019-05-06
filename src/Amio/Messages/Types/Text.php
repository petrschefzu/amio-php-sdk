<?php

namespace MYPS\Amio\Messages\Types;

/**
 * Class TextMessage
 */
final class Text implements MessageInterface
{

    /**
     * Content of message.
     *
     * @var string
     */
    private $_content;


    /**
     * Message constructor.
     *
     * @param string $content Message content.
     */
    public function __construct(string $content)
    {
        $this->_content = $content;

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
            'payload' => $this->_content,
        ];

    }//end getContent()


    /**
     * Return type of message.
     *
     * @return string
     */
    public function getType(): string
    {
        return Enum::TEXT;

    }//end getType()


}//end class
