<?php
declare(strict_types=1);

namespace MYPS\Amio\Tests\Webhooks\Security;

use MYPS\Amio\Security\XHubSignature;
use PHPUnit\Framework\TestCase;

final class XHubSignatureTest extends TestCase
{

    public function testVerify()
    {
        $secret = 'WebhookSecret';
        $body = '{"event":"messages_delivered","timestamp":"2018-03-01T11:54:14.886Z","data":{"channel":{"id":"viber_service_messages_test","type":"viber"},"contact":{"phone_number":"+420606123456"},"messages":[{"id":"151990525359991"}]}}';
        $expected = 'sha1=cb041d03489e961730cb6c7a6d1edf58ae88ef13';

        $this->assertTrue(XHubSignature::isValid($secret, $body, $expected));
    }
}