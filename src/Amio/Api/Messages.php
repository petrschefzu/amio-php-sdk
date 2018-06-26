<?php

namespace MYPS\Amio\Api;

use MYPS\Amio\Contacts\Types\ContactTypeInterface;
use MYPS\Amio\Exceptions\AmioResponseException;
use MYPS\Amio\Messages\MessageInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Messages
 */
class Messages
{

    /**
     * Amio client
     *
     * @var Client
     */
    private $_client;

    /**
     * Last request response.
     *
     * @var null|ResponseInterface
     */
    private $_lastResponse = null;


    /**
     * Messages constructor.
     *
     * @param Client $client Amio client.
     */
    public function __construct(Client $client)
    {
        $this->_client = $client;

    }//end __construct()


    /**
     * List contact messages.
     *
     * @param int $channelId Channel id.
     * @param int $contactId Contact id.
     * @param int $limit     Number of maximum rows to get.
     * @param int $offset    Number of rows to skip.
     *
     * @return ResponseInterface
     * todo: return array of messages
     */
    public function list(int $channelId, int $contactId, int $limit=10, int $offset=0): ResponseInterface
    {
        return $this->_client->request(
            'GET',
            '/v1/channels/'.$channelId.'/contacts/'.$contactId.'/messages?max='.$limit.'&offset='.$offset
        );

    }//end list()


    /**
     * Send message to Amio API.
     *
     * @param MessageInterface     $message   Message object.
     * @param int                  $channelId Channel ID.
     * @param ContactTypeInterface $contact   Contact.
     *
     * @throws AmioResponseException When API return another status then 200 return exception.
     * @return int
     */
    public function send(MessageInterface $message, int $channelId, ContactTypeInterface $contact): int
    {
        $body = [
            'channel' => ['id' => (string) $channelId],
            'contact' => $contact->getContent(),
            'content' => $message->getContent(),
        ];

        $this->_lastResponse = $this->_client->request('POST', '/v1/messages', ['json' => $body]);

        if ($this->_lastResponse->getStatusCode() !== 201) {
            throw new AmioResponseException($this->_lastResponse->getBody()->getContents());
        }

        $responseContent = json_decode($this->_lastResponse->getBody()->getContents(), true);

        return (int) $responseContent['id'];

    }//end send()


}//end class
