<?php

namespace MYPS\Amio\Contacts\Types;

/**
 * Interface ContactTypeInterface
 */
interface ContactTypeInterface
{


    /**
     * Return contact data as array.
     *
     * @return array
     */
    public function getContent(): array;


}//end interface
