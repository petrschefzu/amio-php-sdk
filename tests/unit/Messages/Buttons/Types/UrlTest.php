<?php
declare(strict_types=1);

namespace MYPS\Amio\Tests\Messages\Buttons\Types;

use MYPS\Amio\Messages\Buttons\Types\Url;
use PHPUnit\Framework\TestCase;

final class UrlTest extends TestCase
{
    public function testAssertion(): void
    {
        $title = 'Test title';
        $url = 'https://www.google.com/';

        $button = new Url($title, $url);
        $this->assertEquals("url", $button->getType());
        $this->assertEquals($title, $button->getTitle());
        $this->assertEquals($url, $button->getPayload());
    }
}
