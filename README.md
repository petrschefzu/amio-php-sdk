# amio-php-sdk
A PHP client library for accessing Amio.io APIs https://docs.amio.io/v1.0/reference

## Message types

> **Text message**
```php
$message = new \MYPS\Amio\Messages\TextMessage('This is test.');
```

> **Image message**
```php
$message = new \MYPS\Amio\Messages\ImageMessage('https://www.example.com/photo.jpeg');
```

> **Audio message**
```php
$message = new \MYPS\Amio\Messages\AudioMessage('https://www.example.com/audio.mp3');
```

> **Video message**
```php
$message = new \MYPS\Amio\Messages\VideoMessage('https://www.example.com/video.mp4');
```

> **File message**
```php
$message = new \MYPS\Amio\Messages\FileMessage('https://www.example.com/file.pdf');
```

## Contact types

> **Amio contact id**
```php
$contact = new MYPS\Amio\Contacts\Types\Identifier('channel_contact_id');
```

> **Phone number**
```php
$contact = new \MYPS\Amio\Contacts\Types\PhoneNumber('+420123456789');
```
## Usage

> **Note:** This version of the Amio SDK for PHP requires PHP 7.1 or greater.

```php
require_once __DIR__ . '/vendor/autoload.php'; // change path as needed

$client = new \MYPS\Amio\Api\Client('access_token');

$messageApi = new \MYPS\Amio\Api\Messages($client);

$contact = new MYPS\Amio\Contacts\Types\Identifier('contact_id');
$message = new \MYPS\Amio\Messages\TextMessage('This is test.');

try{
    $messageApi->send($message, 'channel_id', $idContact);
} catch (\MYPS\Amio\Exceptions\AmioResponseException $e) {
    echo 'Amio return an error: '.$e->getMessage();
}