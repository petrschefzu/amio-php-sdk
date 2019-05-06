<?php
declare(strict_types=1);

namespace MYPS\Amio\Tests\WebHooks\Types;

use MYPS\Amio\WebHooks\Types\Enum;
use MYPS\Amio\WebHooks\Types\MessagesDelivered;
use PHPUnit\Framework\TestCase;

final class MessageDeliveredTest extends TestCase
{
    public function testAssert()
    {
        $data = [
            'event' => 'messages_delivered',
            'timestamp' => '2016-10-06T13:42:48Z',
            'data' =>
                [
                    'channel' =>
                        [
                            'id' => '6456078759331238786',
                            'type' => 'facebook_messenger',
                        ],
                    'contact' =>
                        [
                            'id' => '6456078781510718339',
                        ],
                    'messages' =>
                        [
                            [
                                'id' => '6456078996108088196',
                            ],
                            [
                                'id' => '6456079002382766981',
                            ],
                        ],
                    'delivered_timestamp' => '2016-10-06T13:40:01Z',
                ],
        ];


        $webHookMessage = MessagesDelivered::createFromRequest($data);


        $this->assertEquals('6456078759331238786', $webHookMessage->getChannelId());
        $this->assertEquals('6456078781510718339', $webHookMessage->getContactId());
        $this->assertEquals(Enum::MESSAGE_DELIVERED, $webHookMessage->getType());
        $this->assertEquals([
            [
                'id' => '6456078996108088196',
            ],
            [
                'id' => '6456079002382766981',
            ],
        ], $webHookMessage->getMessages());

    }
}