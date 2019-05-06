<?php
declare(strict_types=1);

namespace MYPS\Amio\Tests\WebHooks\Types;

use MYPS\Amio\WebHooks\Types\Enum;
use MYPS\Amio\WebHooks\Types\MessageFailed;
use PHPUnit\Framework\TestCase;

final class MessageFailedTest extends TestCase
{
    public function testAssert()
    {
        $data = [
            'event' => 'message_failed',
            'timestamp' => '2016-10-06T13:42:48Z',
            'data' =>
                [
                    'channel' =>
                        [
                            'id' => '1527759271281586456078759331238786',
                            'type' => 'mobile',
                        ],
                    'contact' =>
                        [
                            'id' => '6456078781510718339',
                            'phone_number' => '15558576309',
                        ],
                    'message' =>
                        [
                            'id' => '6456078996108088196',
                        ],
                    'error' => [
                        "code" => 1,
                        "message" => "Error while processing the request."
                    ],
                    'delivered_timestamp' => '2016-10-06T13:40:01Z',
                ],
        ];


        $webHookMessage = MessageFailed::createFromRequest($data);


        $this->assertEquals('1527759271281586456078759331238786', $webHookMessage->getChannelId());
        $this->assertEquals('6456078781510718339', $webHookMessage->getContactId());
        $this->assertEquals(Enum::MESSAGE_FAILED, $webHookMessage->getType());
        $this->assertEquals('6456078996108088196', $webHookMessage->getMessageId());
        $this->assertEquals(1, $webHookMessage->getErrorCode());
        $this->assertEquals('Error while processing the request.', $webHookMessage->getErrorMessage());

    }
}