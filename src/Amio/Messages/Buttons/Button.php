<?php

namespace MYPS\Amio\Messages\Buttons;

use MYPS\Amio\Messages\Buttons\Types\Url;

/**
 * Class Button
 */
final class Button
{
    /**
     * Create url button
     *
     * @param string $title Button title.
     * @param string $url Button link.
     *
     * @return Url
     */
    public static function url(string $title, string $url): Url
    {
        return new Url($title, $url);

    }//end url()


}//end class