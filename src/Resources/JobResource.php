<?php

namespace Mafikes\Cdn77Api\Resources;

use Mafikes\Cdn77Api\Client;
use Mafikes\Cdn77Api\Resources\Interfaces\JobInterface;

class JobResource implements JobInterface
{
    const JOB_TYPE_PURGE = 'purge';
    const JOB_TYPE_PREFETCH = 'prefetch';
    const JOB_TYPE_PURGE_ALL = 'purge-all';

    /** @var Client The Client instance */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    /**
     * Returns a filtered list of jobs for a given CDN Resource and type.
     * @param $id
     * @param $type
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList($id, $type)
    {
        return $this->client->askServer('GET', 'cdn/' . $id . '/job-log/' . $type);
    }

    /**
     * Returns detailed information regarding particular data manipulation API request.
     * @param $id
     * @param $jobId
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDetail($id, $jobId)
    {
        return $this->client->askServer('GET', 'cdn/' . $id . '/job/' . $jobId);
    }

    /**
     * Allows you to prepopulate certain files into CDN cache on all datacenters. Useful for reducing load on your origin server coming from a new content.
     * @param $id
     * @param $data
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function prefetch($id, $data)
    {
        return $this->client->askServer('POST', 'cdn/' . $id . '/job/prefetch', null, $data);
    }

    /**
     * Allows you to rotate certain files out of the cache. Particularly useful to prevent stale response.
     * @param $id
     * @param $data
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function purge($id, $data)
    {
        return $this->client->askServer('POST', 'cdn/' . $id . '/job/purge', null, $data);
    }

    /**
     * Allows you to instantly remove all cached content from all datacenters.
     * @param $id
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function purgeAll($id)
    {
        return $this->client->askServer('POST', 'cdn/' . $id . '/job/purge-all');
    }
}

