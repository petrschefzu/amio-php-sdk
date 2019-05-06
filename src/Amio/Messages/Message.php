<?php

namespace MYPS\Amio\Messages;


use MYPS\Amio\Messages\Types\Audio;
use MYPS\Amio\Messages\Types\File;
use MYPS\Amio\Messages\Types\Image;
use MYPS\Amio\Messages\Types\Structure;
use MYPS\Amio\Messages\Types\Text;
use MYPS\Amio\Messages\Types\Video;

/**
 * Class Message
 */
final class Message
{
    /**
     * Create text message
     *
     * @param string $content Message text.
     * @return Text
     */
    public static function text(string $content): Text
    {
        return new Text($content);

    }//end text()

    /**
     * Create audio message
     *
     * @param string $url Link to audio.
     * @return Audio
     */
    public static function audio(string $url): Audio
    {
        return new Audio($url);

    }//end audio()

    /**
     * Create file message.
     *
     * @param string $url Link to file.
     *
     * @return File
     */
    public static function file(string $url): File
    {
        return new File($url);

    }//end file()

    /**
     * Create video message.
     *
     * @param string $url Link to video.
     *
     * @return Video
     */
    public static function video(string $url): Video
    {
        return new Video($url);

    }//end video()

    /**
     * Create image message.
     *
     * @param string $url Link to image.
     *
     * @return Image
     */
    public static function image(string $url): Image
    {
        return new Image($url);

    }//end image()

    /**
     * Create structure message.
     *
     * @return Structure
     */
    public static function structure(): Structure
    {
        return new Structure();

    }//end structure()


}