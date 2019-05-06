<?php

namespace MYPS\Amio\Messages\Types\Structure;

use MYPS\Amio\Messages\Buttons\Button;
use MYPS\Amio\Messages\Buttons\Types\ButtonInterface;
use MYPS\Amio\Messages\Types\Enum;
use MYPS\Amio\Messages\Types\MessageInterface;

/**
 * Class Item
 */
class Message implements MessageInterface
{
    /**
     * Item of message
     *
     * @var string
     */
    private $_title;

    /**
     * Message text
     *
     * @var string
     */
    private $_text;

    /**
     * Link to image
     *
     * @var string
     */
    private $_imageUrl;

    /**
     * Link to message
     *
     * @var string
     */
    private $_itemUrl;

    /**
     * Message buttons
     *
     * @var array
     */
    private $buttons;

    /**
     * Item constructor.
     *
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->_title = $title;
        $this->_text = '';
        $this->_imageUrl = '';
        $this->_itemUrl = '';
        $this->buttons = [];

    }//end __construct()

    /**
     * Set message text
     *
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->_text = $text;

    }//end setText()

    /**
     * Set message image
     *
     * @param string $url
     */
    public function setImageUrl(string $url): void
    {
        $this->_imageUrl = $url;

    }//end setImageUrl()


    /**
     * Set message link
     *
     * @param string $url
     */
    public function setItemUrl(string $url): void
    {
        $this->_itemUrl = $url;

    }//end setItemUrl()

    /**
     * Add button to message
     *
     * @param ButtonInterface $button
     */
    public function addButton(ButtonInterface $button): void
    {
        $this->buttons[] = $button;

    }//end addButton()


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
     * Return message data as array.
     *
     * @return array
     */
    public function getContent(): array
    {
        $buttons = [];
        if (count($this->buttons)) {
            /** @var ButtonInterface $button */
            foreach ($this->buttons as $button) {
                $buttons[] = [
                    "type" => $button->getType(),
                    "title" => $button->getTitle(),
                    "payload" => $button->getPayload(),
                ];
            }
        }

        return [
            "title" => $this->_title,
            "text" => $this->_text,
            "image_url" => $this->_imageUrl,
            "item_url" => $this->_itemUrl,
            "buttons" => $buttons,
        ];

    }//end getContent()


}//end class