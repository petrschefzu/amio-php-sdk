<?php
declare(strict_types=1);

namespace MYPS\Amio\Tests\Messages\Buttons;

use MYPS\Amio\Messages\Buttons\Button;
use MYPS\Amio\Messages\Buttons\Types\Url;
use PHPUnit\Framework\TestCase;

final class ButtonTest extends TestCase
{

    public function testUrlButtonCanBeCreated(): void
    {
        $title = 'Test title';
        $url = 'https://www.google.com/';

        $button = Button::url($title, $url);

        $this->assertInstanceOf(Url::class, $button);
    }
}
