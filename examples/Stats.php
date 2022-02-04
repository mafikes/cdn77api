<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \Mafikes\Cdn77Api\Client;

// Client Register
$client = new Client('your_token_here');

// Documentation
// https://client.cdn77.com/support/api-docs/v3/statistics

$dateFrom = new DateTime('2020-01-01');
$dateTo = new DateTime('2020-08-06');

$client->stats->get($client->stats::TYPE_BANDWIDTH, $dateFrom->getTimestamp(), $dateTo->getTimestamp());
