<?php
declare(strict_types=1);

namespace MYPS\Amio\Tests\Messages\Types;

use MYPS\Amio\Messages\Types\Video;
use PHPUnit\Framework\TestCase;

final class VideoTest extends TestCase
{
    public function testAssertion(): void
    {
        $url = 'https://www.google.com/';

        $message = new Video($url);
        $this->assertEquals(
            [
                "type" => "video",
                "payload" => [
                    "url" => $url,
                ],
            ],
            $message->getContent()
        );
    }
}
