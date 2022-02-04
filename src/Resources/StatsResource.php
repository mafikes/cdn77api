<?php

namespace Mafikes\Cdn77Api\Resources;

use Mafikes\Cdn77Api\Client;
use Mafikes\Cdn77Api\Resources\Interfaces\StatsResourceInterface;

class StatsResource implements StatsResourceInterface
{
    /** @var Client The Client instance */
    private $client;

    /** Types to get Stats */
    const TYPE_BANDWIDTH = 'bandwidth';
    const TYPE_COSTS = 'costs';
    const TYPE_HEADERS = 'headers';
    const TYPE_HEADERS_DETAIL = 'headers-detail';
    const TYPE_HIT_MISS = 'hit-miss';
    const TYPE_HIT_MISS_DETAIL = 'hit-miss-detail';
    const TYPE_TRAFFIC = 'traffic';
    const TYPE_TRAFFIC_DETAIL = 'traffic-detail';
    const TYPE_TRAFFIC_MISS = 'traffic-miss';

    /**
     * Products constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $type
     * @param $dateFrom
     * @param $dateTo
     * @param $cdnIds
     * @param $locationIds
     * @param $aggregation
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($type, $dateFrom, $dateTo, $cdnIds = null, $locationIds = null, $aggregation = null)
    {
        $params = array(
            'type' => $type,
            'from' => $dateFrom,
            'to' => $dateTo
        );

        if(!is_null($cdnIds)) $params['cdn_ids'] = $cdnIds;

        return $this->client->askServer('GET', 'report/details', $params);
    }
}

