<?php

namespace Mafikes\Cdn77Api\Resources;

use Mafikes\Cdn77Api\Client;
use Mafikes\Cdn77Api\Resources\Interfaces\ReportResourceInterface;

class ReportResource implements ReportResourceInterface
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
     * Get the costs and bandwidth consumption for your traffic statistics.
     * @param $type
     * @param $dateFrom
     * @param $dateTo
     * @param null $cdnIds
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDetailTraffic($type, $dateFrom, $dateTo, $cdnIds = null)
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

