<?php
declare(strict_types=1);

namespace MYPS\Amio\Tests\Messages\Types;

use MYPS\Amio\Messages\Types\Structure;
use MYPS\Amio\Messages\Types\Structure\Message;
use PHPUnit\Framework\TestCase;

final class StructureTest extends TestCase
{
    public function testSingleMessage(): void
    {
        $title = 'Message title';
        $text = 'Message text';
        $imageUrl = '';
        $itemUrl = '';

        $message = new Message($title);
        $message->setText($text);
        $message->setImageUrl($imageUrl);
        $message->setItemUrl($itemUrl);

        $structure = new Structure();
        $structure->addStructure($message);

        $this->assertEquals(
            [
                "type" => "structure",
                "payload" => [
                    "title" => $title,
                    "text" => $text,
                    "image_url" => $imageUrl,
                    "item_url" => $itemUrl,
                    "buttons" => [],
                ],
            ],
            $structure->getContent()
        );
    }

    public function testMultipleMessages(): void
    {
        $title_1 = 'Message title';
        $text_1 = 'Message text';
        $imageUrl_1 = '';
        $itemUrl_1 = '';

        $message_1 = new \MYPS\Amio\Messages\Types\Structure\Message($title_1);
        $message_1->setText($text_1);
        $message_1->setImageUrl($imageUrl_1);
        $message_1->setItemUrl($itemUrl_1);

        $title_2 = 'Message title 2';
        $text_2 = 'Message text 2';
        $imageUrl_2 = '2';
        $itemUrl_2 = '2';

        $message_2 = new \MYPS\Amio\Messages\Types\Structure\Message($title_2);
        $message_2->setText($text_2);
        $message_2->setImageUrl($imageUrl_2);
        $message_2->setItemUrl($itemUrl_2);

        $structure = new \MYPS\Amio\Messages\Types\Structure();
        $structure->addStructure($message_1);
        $structure->addStructure($message_2);

        $this->assertEquals(
            [
                "type" => "structure",
                "payload" => [
                    [
                        "title" => $title_1,
                        "text" => $text_1,
                        "image_url" => $imageUrl_1,
                        "item_url" => $itemUrl_1,
                        "buttons" => [],
                    ],
                    [
                        "title" => $title_2,
                        "text" => $text_2,
                        "image_url" => $imageUrl_2,
                        "item_url" => $itemUrl_2,
                        "buttons" => [],
                    ],
                ],
            ],
            $structure->getContent()
        );
    }
}
