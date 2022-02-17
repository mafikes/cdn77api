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
     * @throws \Exception
     */
    public function create($data = array())
    {
        return $this->client->askServer('POST', 'cdn', null, $data);
    }

    /**
     * Add CNAME
     * @param $cdnResourceId
     * @param $data
     * @return mixed|string
     * @throws \Exception
     */
    public function createCname($cdnResourceId, $data = array())
    {
        return $this->client->askServer('POST', 'cdn/'.$cdnResourceId.'/cname', null, $data);
    }

    /**
     * Enable Datacenters
     * @param $cdnResourceId
     * @param $data
     * @return mixed|string
     * @throws \Exception
     */
    public function enableDatacenters($cdnResourceId, $data)
    {
        return $this->client->askServer('PUT', 'cdn/'.$cdnResourceId.'/datacenters', null, $data);
    }

    /**
     * Get your http CDN resource details.
     * @param $cdnResourceId
     * @return mixed|string
     * @throws \Exception
     */
    public function getDetail($cdnResourceId)
    {
        return $this->client->askServer('GET', 'cdn/'.$cdnResourceId);
    }

    /**
     * Change your CDN Resource details.
     * @param $cdnResourceId
     * @param array $data
     * @return mixed|string
     * @throws \Exception
     */
    public function edit($cdnResourceId, $data = array())
    {
        return $this->client->askServer('PATCH', 'cdn/'.$cdnResourceId);
    }

    /**
     * Delete your CDN resource.
     * @param $cdnResourceId
     * @return mixed|string
     * @throws \Exception
     */
    public function delete($cdnResourceId)
    {
        return $this->client->askServer('DELETE', 'cdn/'.$cdnResourceId);
    }

    /**
     * List your CDN resource details.
     * @return mixed|string
     * @throws \Exception
     */
    public function getList()
    {
        return $this->client->askServer('GET','cdn');
    }

    /**
     * List of CNAMEs
     * @param $cdnResourceId
     * @return mixed|string
     * @throws \Exception
     */
    public function getListCnames($cdnResourceId)
    {
        return $this->client->askServer('GET','cdn/'.$cdnResourceId.'/cname');
    }

    /**
     * List of Datacenters
     * @param $cdnResourceId
     * @return mixed|string
     * @throws \Exception
     */
    public function getListDatacenter($cdnResourceId)
    {
        return $this->client->askServer('GET','cdn/'.$cdnResourceId.'/datacenters');
    }
}

