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
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFiles()
    {
        return $this->client->askServer('GET', 'raw-logs/get-files');
    }

    /**
     * @param $cdnResourceId
     * @param $fileName
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function download($cdnResourceId, $fileName)
    {
        return $this->client->askServer('GET', 'raw-logs/get-files', array(
            'cdn_id' => $cdnResourceId,
            'file_name' => $fileName
        ));
    }
}

