<?php

namespace Mafikes\Cdn77Api\Resources;

use Mafikes\Cdn77Api\Client;
use Mafikes\Cdn77Api\Resources\Interfaces\DataManagementInterface;

class DataManagementResource implements DataManagementInterface
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
     * Allows new HTTP Pull content to be pre-populated to your CDN data centers.
     * @param $cdnResourceId
     * @param array $urls
     * @return array|mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function prefetch($cdnResourceId, $urls = array())
    {
        return $this->client->askServer('POST', 'data/prefetch', null, array(
            'cdn_id' => (int)$cdnResourceId,
            'url' => $urls
        ));
    }

    /**
     * Instant removal of HTTP Pull cache content from all datacenters, if newly updated content has not yet been reflected.
     * @param $cdnResourceId
     * @param array $urls
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function purge($cdnResourceId, $urls = array())
    {
        return $this->client->askServer('POST', 'data/purge', null, array(
            'cdn_id' => (int)$cdnResourceId,
            'url' => $urls
        ));
    }

    /**
     * Instant removal of all HTTP content.
     * @param $cdnResourceId
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function purgeAll($cdnResourceId)
    {
        return $this->client->askServer('POST', 'data/purge-all', null, array(
            'cdn_id' => (int)$cdnResourceId,
        ));
    }
}

