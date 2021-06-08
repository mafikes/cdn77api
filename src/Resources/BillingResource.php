<?php

namespace Mafikes\Cdn77Api\Resources;

use Mafikes\Cdn77Api\Client;
use Mafikes\Cdn77Api\Resources\Interfaces\BillingInterface;

class BillingResource implements BillingInterface
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
     * Get Billing Overview
     * @return array|mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDetails()
    {
        return $this->client->askServer('GET','billing-overview/details');
    }
}

