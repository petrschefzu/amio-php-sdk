<?php
declare(strict_types=1);

namespace MYPS\Amio\Tests\Messages\Types\Structure;

use MYPS\Amio\Messages\Buttons\Button;
use MYPS\Amio\Messages\Types\Structure\Message;
use PHPUnit\Framework\TestCase;

final class MessageTest extends TestCase
{
    public function testWithButton(): void
    {

        $title = 'Message title';
        $text = 'Message text';
        $imageUrl = '';
        $itemUrl = '';

        $message = new Message($title);
        $message->setText($text);
        $message->setImageUrl($imageUrl);
        $message->setItemUrl($itemUrl);

        $buttonTitle = 'Button title';
        $buttonUrl = '';

        $button = Button::url($buttonTitle, $buttonUrl);
        $message->addButton($button);

        $this->assertEquals(
            [
                "title" => $title,
                "text" => $text,
                "image_url" => $imageUrl,
                "item_url" => $itemUrl,
                "buttons" => [
                    [
                        "type" => "url",
                        "title" => $buttonTitle,
                        "payload" => $buttonUrl,
                    ]
                ],
            ],
            $message->getContent()
        );
    }
}
