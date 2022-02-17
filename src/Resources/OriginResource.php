<?php

namespace Mafikes\Cdn77Api\Resources;

use Mafikes\Cdn77Api\Client;
use Mafikes\Cdn77Api\Resources\Interfaces\OriginInterface;

class OriginResource implements OriginInterface
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
     * List of Origins
     * @return mixed|string
     * @throws \Exception
     */
    public function getList()
    {
        return $this->client->askServer('GET','origin');
    }

    /**
     * Create Your Origin
     * @param $data
     * @return mixed|string
     * @throws \Exception
     */
    public function create($data)
    {
        if(!is_array($data)) throw new \Exception('cdn77Api: function create new origin, data input is not array format.');
        return $this->client->askServer('POST', 'storage/create', null, $data);
    }

    /**
     * Detail of Your Origin
     * @param $id
     * @return mixed|string
     * @throws \Exception
     */
    public function getDetail($id)
    {
        return $this->client->askServer('GET','origin/'.$id);
    }

    /**
     * Change of origin affects all your assigned CDN Resources.
     * @param $id
     * @param $data
     * @return mixed|string
     * @throws \Exception
     */
    public function edit($id, $data)
    {
        if(!is_array($data)) throw new \Exception('cdn77Api: function create new origin, data input is not array format.');
        return $this->client->askServer('PATCH', 'origin/'.$id, null, $data);
    }

    /**
     * Delete Origin
     * @param $id
     * @return mixed|string
     * @throws \Exception
     */
    public function delete($id)
    {
        return $this->client->askServer('DELETE', 'origin/'.$id);
    }

    /**
     * Create AWS Origin
     * @param $data
     * @return mixed|string
     * @throws \Exception
     */
    public function createAwsOrigin($data)
    {
        return $this->client->askServer('POST', 'origin/aws', null, $data);
    }
}

