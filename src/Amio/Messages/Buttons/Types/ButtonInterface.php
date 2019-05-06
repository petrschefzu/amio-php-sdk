<?php

namespace MYPS\Amio\Messages\Buttons\Types;


interface ButtonInterface
{

    /**
     * Return type of message.
     *
     * @return string
     */
    public function getType(): string;


    /**
     * Return message title.
     *
     * @return string
     */
    public function getTitle(): string;

    /**
     * Return payload
     *
     * @return string
     */
    public function getPayload(): string;


}//end class