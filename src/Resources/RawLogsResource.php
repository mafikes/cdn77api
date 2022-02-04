<?php

namespace Mafikes\Cdn77Api\Resources;

use Mafikes\Cdn77Api\Client;
use Mafikes\Cdn77Api\Resources\Interfaces\RawLogsResourceInterface;

class RawLogsResource implements RawLogsResourceInterface
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
     * List of CDN Resource Raw Logs
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList()
    {
        return $this->client->askServer('GET', 'raw-logs');
    }

    /**
     * Activate Raw Logs for CDN Resource
     * @param $cdnId
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function activateRawLog($cdnId)
    {
        return $this->client->askServer('POST', 'raw-logs/activate', null, array(
            'cdn_id' => $cdnId
        ));
    }

    /**
     * Deactivate Raw Logs for CDN Resource
     * @param $cdnId
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deactivateRawLog($cdnId)
    {
        return $this->client->askServer('POST', 'raw-logs/deactivate', null, array(
            'cdn_id' => $cdnId
        ));
    }

    /**
     * @param $cdnResourceId
     * @param $fileName
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function download($cdnResourceId, $fileName)
    {
        return $this->client->askServer('GET', 'raw-logs/download', array(
            'cdn_id' => $cdnResourceId,
            'file_name' => $fileName
        ));
    }
}

