<?php

namespace MYPS\Amio\Contacts\Types;

/**
 * Class PhoneNumber
 */
final class PhoneNumber implements ContactTypeInterface
{

    /**
     * Phone number.
     *
     * @var string Phone number.
     */
    private $_phoneNumber;


    /**
     * PhoneNumber constructor.
     *
     * @param string $phoneNumber Contact phone number.
     */
    public function __construct(string $phoneNumber)
    {
        $this->_phoneNumber = $phoneNumber;

    }//end __construct()


    /**
     * Return contact data as array.
     *
     * @return array
     */
    public function getContent(): array
    {
        return ['phone_number' => $this->_phoneNumber];

    }//end getContent()


}//end class
