<?php

namespace Mafikes\Cdn77Api\Resources;

use Mafikes\Cdn77Api\Client;
use Mafikes\Cdn77Api\Resources\Interfaces\CdnResourceInterface;

class CdnResource implements CdnResourceInterface
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
     * Create a HTTP CDN resource.
     * @param array $data
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create($data = array())
    {
        return $this->client->askServer('POST', 'cdn-resource/create', null, $data);
    }

    /**
     * Get your http CDN resource details.
     * @param $cdnResourceId
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDetail($cdnResourceId)
    {
        return $this->client->askServer('GET', 'cdn-resource/details', array(
            'id' => $cdnResourceId
        ));
    }

    /**
     * Change your CDN Resource details.
     * @param $cdnResourceId
     * @param array $data
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($cdnResourceId, $data = array())
    {
        $data['id'] = (int)$cdnResourceId;
        return $this->client->askServer('POST', 'cdn-resource/edit', null, $data);
    }

    /**
     * Delete your CDN resource.
     * @param $cdnResourceId
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($cdnResourceId)
    {
        $data['id'] = (int)$cdnResourceId;
        return $this->client->askServer('POST', 'cdn-resource/delete', null, $data);
    }

    /**
     * List your CDN resource details.
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList()
    {
        return $this->client->askServer('GET','cdn-resource/list');
    }
}

