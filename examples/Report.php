<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \Mafikes\Cdn77Api\Client;

// Client Register
$client = new Client('yourLoginEmail', 'yourTokenFromAdministration');

// Doc: https://client.cdn77.com/support/api-docs/v2/report
$dateFrom = new DateTime('2020-01-01');
$dateTo = new DateTime('2020-08-06');

/**
 * Get the costs and bandwidth consumption for your traffic statistics.
 * type string* 	    bandwidth 	Valid values: 'bandwidth' | 'costs' | 'headers' | 'hit-miss' | 'traffic'
 * from int* 	        1398139200 for 22-04-2014. 	timestamp
 * to int* 	            1398139200 for 22-04-2014. 	timestamp
 * cdn_ids array 		List of ids of CDN Resources. See how to retrieve list of CDN Resources.
 */
$client->report->getDetailTraffic('bandwidth', $dateFrom->getTimestamp(), $dateTo->getTimestamp());

// Get only with this CDN IDs resouce
$client->report->getDetailTraffic('bandwidth', $dateFrom->getTimestamp(), $dateTo->getTimestamp(), array(
    101010,
    20102
));
