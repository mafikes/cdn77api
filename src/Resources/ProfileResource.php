<?php

namespace Mafikes\Cdn77Api\Resources;

use Mafikes\Cdn77Api\Client;
use Mafikes\Cdn77Api\Resources\Interfaces\ProfileInterface;

class ProfileResource implements ProfileInterface
{
    /** @var Client The Client instance */
    private $client;

    /**
     * Products constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get details of account
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMe()
    {
        return $this->client->askServer('GET','account/details');
    }
}

