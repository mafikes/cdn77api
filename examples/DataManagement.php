<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \Mafikes\Cdn77Api\Client;

// Client Register
$client = new Client('yourLoginEmail', 'yourTokenFromAdministration');

// Doc: https://client.cdn77.com/support/api-docs/v2/data

// Allows new HTTP Pull content to be pre-populated to your CDN data centers.
$client->dataManagement->prefetch(21703, array(
    '/assets/images/image1.png',
));

// Instant removal of HTTP Pull cache content from all datacenters, if newly updated content has not yet been reflected.
$client->dataManagement->purge(2170, array(
    '/assets/images/image1.png'
));

// Instant removal of all HTTP content.
$client->dataManagement->purgeAll(2170);


