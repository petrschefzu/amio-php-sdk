<?php

namespace MYPS\Amio\Contacts\Types;

/**
 * Class Identifier
 */
final class Identifier implements ContactTypeInterface
{

    /**
     * Amio contact ID.
     *
     * @var int Contact ID.
     */
    private $_id;


    /**
     * Identifier constructor.
     *
     * @param int $contactId Contact ID.
     */
    public function __construct(int $contactId)
    {
        $this->_id = $contactId;

    }//end __construct()


    /**
     * Return contact data as array.
     *
     * @return array
     */
    public function getContent(): array
    {
        return ['id' => (string) $this->_id];

    }//end getContent()


}//end class
