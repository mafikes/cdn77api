<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \Mafikes\Cdn77Api\Client;

// Client Register
$client = new Client('yourLoginEmail', 'yourTokenFromAdministration');

// Doc: https://client.cdn77.com/support/api-docs/v2/data-queue

// Retrieve a list of purge and prefetch requests. You will receive last 1000 requests.
$client->dataQueue->getListAll();
$client->dataQueue->getListAll('prefetch'); // Type of request. Valid values: 'prefetch' | 'purge'

$client->dataQueue->getList(2170); // Get all by resource ID
$client->dataQueue->getList(2170, 'prefetch'); // Get by resource ID and type 'prefetch' | 'purge'

// Get details for a particular request.
$client->dataQueue->getDetail(65532);

// List the URLS for a particular request.
$client->dataQueue->getListUrl(2170, 65532);


