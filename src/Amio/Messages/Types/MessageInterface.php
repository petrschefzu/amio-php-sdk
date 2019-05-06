<?php

namespace MYPS\Amio\Messages\Types;

/**
 * Interface MessageInterface
 */
interface MessageInterface
{


    /**
     * Return type of message.
     *
     * @return string
     */
    public function getType(): string;


    /**
     * Return message data as array.
     *
     * @return array
     */
    public function getContent(): array;


}//end interface
