<?php
declare(strict_types=1);

namespace MYPS\Amio\Tests\Messages\Types;

use MYPS\Amio\Messages\Types\Image;
use PHPUnit\Framework\TestCase;

final class ImageTest extends TestCase
{
    public function testAssertion(): void
    {
        $url = 'https://www.google.com/';

        $message = new Image($url);
        $this->assertEquals(
            [
                "type" => "image",
                "payload" => [
                    "url" => $url,
                ],
            ],
            $message->getContent()
        );
    }
}
