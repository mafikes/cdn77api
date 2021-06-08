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
    const API_URL = 'https://api.cdn77.com/v2.0/';

    private $login; // Login email
    private $token; // Api Key from administration

    private $client; // Registered Guzzle client

    /** @var Resources\CdnResource */
    public $cdnResource;

    /** @var Resources\BillingResource */
    public $billing;

    /** @var Resources\ProfileResource */
    public $profile;

    /** @var Resources\DataManagementResource */
    public $dataManagement;

    /** @var Resources\DataQueueResource */
    public $dataQueue;

    /** @var Resources\RawLogsResource */
    public $rawLogs;

    /** @var Resources\ReportResource */
    public $report;

    /** @var Resources\StorageResource */
    public $storage;

    /** @var $jsonResponse */
    private $jsonResponse;

    /**
     * Client constructor.
     * @param $login
     * @param $token
     * @param false $jsonResponse
     * @throws \Exception
     */
    public function __construct($login, $token, $jsonResponse = false)
    {
        if (is_string($token) || is_string($login)) {
            $this->token = $token;
            $this->login = $login;
        } else {
            throw new \Exception('Cdn77Api client Class is not specify right (login or apiKey must be defined as string).');
        }

        $this->client = new GuzzleHttp\Client([
            'base_uri' => self::API_URL,
            'timeout' => 0,
        ]);

        $this->jsonResponse = $jsonResponse;
        $this->cdnResource = new Resources\CdnResource($this);
        $this->billing = new Resources\BillingResource($this);
        $this->profile = new Resources\ProfileResource($this);
        $this->dataManagement = new Resources\DataManagementResource($this);
        $this->dataQueue = new Resources\DataQueueResource($this);
        $this->rawLogs = new Resources\RawLogsResource($this);
        $this->report = new Resources\ReportResource($this);
        $this->storage = new Resources\StorageResource($this);
    }

    /**
     * @param array $bodyData
     * @return array[]
     */
    public function createHeader($bodyData = array())
    {
        $header = array(
            'headers' => array(
            )
        );

        if (count($bodyData) > 0) {
            $header['form_params'] = $bodyData;
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
            $parameters['login'] = $this->login;
            $parameters['passwd'] = $this->token;
            $uri = $uri . '?' . http_build_query($parameters);
        } else if(count($bodyData) > 0){
            $bodyData['login'] = $this->login;
            $bodyData['passwd'] = $this->token;
        }

        // Create request
        try {
            $response = $this->client->request($method, $uri, $this->createHeader($bodyData));
        } catch (GuzzleHttp\Exception\RequestException $e) {
            throw new \Exception($e->getResponse()->getBody());
        }

        // Catch Error code from header
        if (!in_array($response->getStatusCode(), array(200, 201)) || is_null($response->getStatusCode())) {
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
