<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \Mafikes\Cdn77Api\Client;

// Client Register
$client = new Client('your_token_here');

// Documentation
// https://client.cdn77.com/support/api-docs/v3/origin

// List of Origins
$client->origin->getList();

// Create origin
$client->origin->create([
    "base_dir" => "/pictures/images/",
    "label" => "My URL Origin",
    "port" => 8080,
    "scheme" => "https",
    "host" => "my-domain.com"
]);

// Detail of origin
$client->origin->getDetail('origin_id');

// Edit origin
$client->origin->edit('origin_id', [
    "aws_access_key_id" => "KLAMIDYDRAP8CJYC1DN",
    "aws_access_key_secret" => "3a1F8jM+xJyDkHdUQazbcq5mDI2gW0vFsFbLi6PW",
    "aws_region" => "us-east-1",
    "base_dir" => "/pictures/images/",
    "label" => "My AWS Origin",
    "scheme" => "https",
    "host" => "my.s3.amazonaws.com",
    "port" => "1000"
]);

// Delete origin
$client->origin->delete('origin_id');

// Create AWS Origin
$client->origin->createAwsOrigin([
    "aws_access_key_id" => "KLAMIDYDRAP8CJYC1DN",
    "aws_access_key_secret" => "3a1F8jM+xJyDkHdUQazbcq5mDI2gW0vFsFbLi6PW",
    "aws_region" => "us-east-1",
    "base_dir" => "/pictures/images/",
    "label" => "My AWS Origin",
    "scheme" => "https",
    "host" => "my.s3.amazonaws.com",
    "port" => 1000
]);