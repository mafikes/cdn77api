<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \Mafikes\Cdn77Api\Client;

// Client Register
$client = new Client('your_token_here');

// List of CDN Resource Raw Logs
$client->rawLogs->getList();

// Activate Raw Logs for CDN Resource
$client->rawLogs->activateRawLog('cdn_id');

// Deactivate Raw Logs for CDN Resource
$client->rawLogs->deactivateRawLog('cdm_id');

// Download Daily Raw Log files for CDN Resource
$client->rawLogs->download('cdn_id', 'filename');

