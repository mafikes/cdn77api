<?php

namespace Mafikes\Cdn77Api\Resources;

use Mafikes\Cdn77Api\Client;
use Mafikes\Cdn77Api\Resources\Interfaces\DataQueueResourceInterface;

class DataQueueResource implements DataQueueResourceInterface
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
     * Retrieve a list of purge and prefetch requests. You will receive last 1000 requests.
     * @param $type
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getListAll($type = null)
    {
        $params = array();
        if(!is_null($type)) $params['type'] = $type;

        return $this->client->askServer('GET', 'data-queue/list-request', $params);
    }

    /**
     * Only for one resource by ID.
     * Retrieve a list of purge and prefetch requests. You will receive last 1000 requests.
     * @param $cdnResourceId
     * @param null $type
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList($cdnResourceId, $type = null)
    {
        $params = array(
            'cdn_id' => $cdnResourceId
        );

        if(!is_null($type)) $params['type'] = $type;

        return $this->client->askServer('GET', 'data-queue/list-request', $params);
    }

    /**
     * Get details for a particular request.
     * @param $requestId
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDetail($requestId)
    {
        return $this->client->askServer('GET', 'data-queue/details-request', array(
            'id' => $requestId
        ));
    }

    /**
     * List the URLS for a particular request by CDNresouceId or requestId.
     * @param $cdnResourceId
     * @param $requestId
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getListUrl($cdnResourceId, $requestId)
    {
        return $this->client->askServer('GET', 'data-queue/list-url', array(
            'cdn_id' => $cdnResourceId,
            'request_id' => $requestId
        ));
    }
}

