# amio-php-sdk
PHP client library implementing [Amio API](https://docs.amio.io/v1.0/reference) for instant messengers.

> Let us know how to improve this library. We'll be more than happy if you report any issues or even create pull requests. ;-)

## Prerequisities
[Signup to Amio](https://app.amio.io/signup) and create a channel before using this library.

## Installation

```bash
composer require myps/amio-php-sdk
```

## Quickstart

#### Send a message
```php
$client = new \MYPS\Amio\Api\Client('get access token at https://app.amio.io/administration/settings/api');

$messageApi = new \MYPS\Amio\Api\Messages($client);


try {
    //Step 1 - create message
    $message = \MYPS\Amio\Messages\Message::text("Hello facebook!");
    
    //Step 2 - send message
    $messageApi->send($message, "{CHANNEL_ID}", ["id" => "{CONTACT_ID}"]);
    
    //Shorter way to send sms to phone number
    $messageApi->sendSMS("Hello world!", "{CHANNEL_ID}", "{PHONE_NUMBER}");
} catch (\MYPS\Amio\Exceptions\AmioResponseException $e) {
    echo "Amio error: {$e->getMessage()}";
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo "Guzzle error: {$e->getMessage()}";
}
```

#### Receive a message
```php
// Create your own classes to handle messages:
class MyDeliveredMessagesHandler implements \MYPS\Amio\Webhooks\WebHookHandlerInterface
{

    public function handleWebHook(array $data): void
    {
        // Optionally you can use predefined message object
        $message = \MYPS\Amio\Webhooks\Types\MessagesDelivered::createFromRequest($data);
    }
}

class MyFailedMessageHandler implements \MYPS\Amio\Webhooks\WebHookHandlerInterface
{

    public function handleWebHook(array $data): void
    {
        // Optionally you can use predefined message object
        $message = \MYPS\Amio\Webhooks\Types\MessageFailed::createFromRequest($data);
    }
}

$webhookHandler = new \MYPS\Amio\Webhooks\WebHookHandler($enable, ['{CHANNEL_ID}' => '{SECRET}']);

$webhookHandler->onMessagesDelivered(new MyDeliveredMessagesHandler());
$webhookHandler->onMessageFailed(new MyFailedMessageHandler());

$webhookHandler->handle(file_get_contents('php://input'), getallheaders());
```