<?php
declare(strict_types=1);

namespace MYPS\Amio\Tests\Messages\Types;

use MYPS\Amio\Messages\Types\Text;
use PHPUnit\Framework\TestCase;

final class TextTest extends TestCase
{
    public function testAssertion(): void
    {
        $text = 'This is test text.';

        $message = new Text($text);
        $this->assertEquals(
            [
                "type" => "text",
                "payload" => $text,
            ],
            $message->getContent()
        );
    }
}
