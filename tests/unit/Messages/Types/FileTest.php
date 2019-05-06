<?php
declare(strict_types=1);

namespace MYPS\Amio\Tests\Messages\Types;

use MYPS\Amio\Messages\Types\File;
use PHPUnit\Framework\TestCase;

final class FileTest extends TestCase
{
    public function testAssertion(): void
    {
        $url = 'https://www.google.com/';

        $message = new File($url);
        $this->assertEquals(
            [
                "type" => "file",
                "payload" => [
                    "url" => $url,
                ],
            ],
            $message->getContent()
        );
    }
}
