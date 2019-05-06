<?php
declare(strict_types=1);

namespace MYPS\Amio\Tests\Messages\Types;

use MYPS\Amio\Messages\Types\Audio;
use PHPUnit\Framework\TestCase;

final class AudioTest extends TestCase
{
    public function testAssertion(): void
    {
        $url = 'https://www.google.com/';

        $message = new Audio($url);
        $this->assertEquals(
            [
                "type" => "audio",
                "payload" => [
                    "url" => $url,
                ],
            ],
            $message->getContent()
        );
    }
}
