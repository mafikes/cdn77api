<?php

namespace Mafikes\Cdn77Api;

use GuzzleHttp;
use Mafikes\Cdn77Api\Resources;

/**
 * API Client for cdn77.com
 * Documentation: https://client.cdn77.com/support/api-docs/v2/account
 * Author: Martin Antoš, mafikes.cz
 */
class Client
{
    const API_URL = 'https://api.cdn77.com/v3/';
    private $token; // Generated Api Key

    private $client; // Registered Guzzle client

    /** @var Resources\CdnResource */
    public $cdnResource;

    /** @var Resources\BillingResource */
    public $billing;

    /** @var Resources\RawLogsResource */
    public $rawLogs;

    /** @var Resources\StatsResource */
    public $stats;

    /** @var Resources\JobResource */
    public $job;

    /** @var Resources\OriginResource */
    public $origin;

    /** @var Resources\StorageResource */
    public $storage;

    /** @var $jsonResponse */
    private $jsonResponse;

    /**
     * @param $token
     * @param $jsonResponse
     * @throws \Exception
     */
    public function __construct($token, $jsonResponse = false)
    {
        if (is_string($token)) {
            $this->token = $token;
        } else {
            throw new \Exception('Cdn77Api client Class is not specify right (login or apiKey must be defined as string).');
        }

        $this->client = new GuzzleHttp\Client([
            'base_uri' => self::API_URL,
            'timeout' => 2.0,
        ]);

        $this->jsonResponse = $jsonResponse;
        $this->cdnResource = new Resources\CdnResource($this);
        $this->billing = new Resources\BillingResource($this);
        $this->job = new Resources\JobResource($this);
        $this->rawLogs = new Resources\RawLogsResource($this);
        $this->stats = new Resources\StatsResource($this);
        $this->storage = new Resources\StorageResource($this);
        $this->origin = new Resources\OriginResource($this);
    }

    /**
     * @param array $bodyData
     * @return array[]
     */
    public function createHeader($bodyData = array())
    {
        $header = array(
            'headers' => array(
                'Authorization' => 'Bearer '.$this->token
            )
        );

        if (count($bodyData) > 0) {
            $header['json'] = $bodyData;
        }

        return $header;
    }

    /**
     * @param $method
     * @param $uri
     * @param array $parameters
     * @param array $bodyData
     * @param null $jsonResponse
     * @return mixed|string
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function askServer($method, $uri, $parameters = array(), $bodyData = array(), $jsonResponse = null)
    {
        // Add params if exist
        if(!is_null($parameters)) {
            $uri = $uri . '?' . http_build_query($parameters);
        } 

        // Create request
        try {
            $response = $this->client->request($method, $uri, $this->createHeader($bodyData));
        } catch (GuzzleHttp\Exception\RequestException $e) {
            throw new \Exception($e->getResponse()->getBody());
        }

        // Catch Error code from header
        if (!in_array($response->getStatusCode(), array(200, 201, 202)) || is_null($response->getStatusCode())) {
            throw new \Exception('Exception: Request Error. Status: ' . $response->getStatusCode() . ' Body: ' . $response->getBody());
        }

        $result = $response->getBody()->getContents();

        if (!$this->jsonResponse || !is_null($jsonResponse) && $jsonResponse === false) {
            $result = json_decode($result);
        }

        return $result;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}
