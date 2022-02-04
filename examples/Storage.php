<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \Mafikes\Cdn77Api\Client;

// Client Register
$client = new Client('your_token_here');

// Detail of Storage Location
$client->storage->detail('your_id');

// Get list of storages
$client->storage->getList();
