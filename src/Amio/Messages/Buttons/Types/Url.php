<?php

namespace MYPS\Amio\Messages\Buttons\Types;

/**
 * Class Url
 */
final class Url implements ButtonInterface
{
    /**
     * Button title
     *
     * @var string
     */
    private $_title;

    /**
     * Button link
     *
     * @var string
     */
    private $_url;

    /**
     * Url constructor.
     *
     * @param string $title Button title.
     * @param string $url Button link.
     */
    public function __construct(string $title, string $url)
    {
        $this->_title = $title;
        $this->_url = $url;

    }//end __construct()

    /**
     * Return type of button.
     *
     * @return string
     */
    public function getType(): string
    {
        return Enum::URL;

    }//end getType()

    /**
     * Get button title.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->_title;

    }//end getTitle()

    /**
     * Get button payload.
     *
     * @return string
     */
    public function getPayload(): string
    {
        return $this->_url;

    }//end getPayload()


}//end class