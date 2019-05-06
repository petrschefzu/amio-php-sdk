<?php

namespace MYPS\Amio\Security;


final class XHubSignature
{

    /**
     * @param string $secret
     * @param string $body
     * @param string $expected
     * @return bool
     */
    public static function isValid(string $secret, string $body, string $expected): bool
    {
        $hmac = hash_hmac("sha1", $body, $secret);
        $hmac = "sha1={$hmac}";

        return $hmac === $expected;
    }//end isValid()


}//end class