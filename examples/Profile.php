<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \Mafikes\Cdn77Api\Client;

// Client Register
$client = new Client('yourLoginEmail', 'yourTokenFromAdministration');

// Get Billing Overview
$client->profile->getMe();



