<?php

namespace Mafikes\Cdn77Api\Resources;

use Mafikes\Cdn77Api\Client;
use Mafikes\Cdn77Api\Resources\Interfaces\StorageResourceInterface;

class StorageResource implements StorageResourceInterface
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
     * List of Storage Locations
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList()
    {
        return $this->client->askServer('GET', 'storage-location');
    }

    /**
     * Detail of Storage Location
     * @param $id
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function detail($id)
    {
        return $this->client->askServer('GET', 'storage-location/'.$id);
    }
}

