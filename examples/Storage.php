<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \Mafikes\Cdn77Api\Client;

// Client Register
$client = new Client('yourLoginEmail', 'yourTokenFromAdministration');

// Doc: https://client.cdn77.com/support/api-docs/v2/storage

// Create new storage
$client->storage->create('test', 'push-12.cdn77.com');

// Detail storage
$client->storage->detail('user_klzez');

// Delete storage
$client->storage->delete('user_klzez');

// Get list of storages
$client->storage->getList();

// Add Cdn resource
$client->storage->addCdnResource('user_klzez', array(
    12313,
    123123
));

// Each CDN storage location has it's own ID.
$client->storage->getLocationsList();
