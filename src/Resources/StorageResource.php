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
     * Create new storage
     * @param $zoneName
     * @param $storageLocationId
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create($zoneName, $storageLocationId)
    {
        return $this->client->askServer('POST', 'storage/create', null, array(
            'zone_name' => $zoneName,
            'storage_location_id' => $storageLocationId
        ));
    }

    /**
     * Storage detail by ID
     * @param $storageId
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function detail($storageId)
    {
        return $this->client->askServer('GET', 'storage/details',  array(
            'id' => $storageId,
        ));
    }

    /**
     * Delete storage
     * @param $storageId
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($storageId)
    {
        return $this->client->askServer('POST', 'storage/delete', null, array(
            'id' => $storageId,
        ));
    }

    /**
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList()
    {
        return $this->client->askServer('GET', 'storage/list');
    }

    /**
     * Each CDN storage location has it's own ID.
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getLocationsList()
    {
        return $this->client->askServer('GET', 'storage-location/list');
    }

    /**
     * @param $storageId
     * @param array $cdnResourceIds
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addCdnResource($storageId, $cdnResourceIds = array())
    {
        if(!is_array($cdnResourceIds)) throw new \Exception('Parameter in storage/add-cdn-resource CDN ids is not array.');

        return $this->client->askServer('POST', 'storage/add-cdn-resource', null, array(
            'id' => $storageId,
            'cdn_ids' => $cdnResourceIds
        ));
    }
}

