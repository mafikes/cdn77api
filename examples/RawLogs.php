<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \Mafikes\Cdn77Api\Client;

// Client Register
$client = new Client('info@indigo.cz', 'CdXaJVU98EvLmHKANyZnQ2zMIq5tFkrD');

// Doc: https://client.cdn77.com/support/api-docs/v2/raw-logs
$client->rawLogs->getFiles();

$client->rawLogs->download(2170, '07Jun20.gz');

