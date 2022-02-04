<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \Mafikes\Cdn77Api\Client;

// Client Register
$client = new Client('your_token_here');

// Documentation
// https://client.cdn77.com/support/api-docs/v3/cdn-resources#add-cdn-resource

// Get list of avalaible resources
$client->cdnResource->getList();

// Create new resource
$client->cdnResource->create(array(
    // All CNAMEs should be mapped via DNS to CDN URL. Otherwise it's not possible to generate SSL certificate. Maximum number of CNAMEs is "10". To add more, contact our support.
    'cnames' => [
        'cname.your-domain.com'
    ],
    // The label helps you to identify your CDN Resource.
    'label' => 'My cdn',
    // ID of attached Origin (content source for CDN Resource). More information in our Origin API documentation.
    'origin_id' => 'e56564d1-8d3e-4457-93a6-082b054bc736'
));

// Get detail of resource
$client->cdnResource->getDetail('cdn_id');

// Edit resource
$client->cdnResource->edit('cdn_id', array(
    'cache' => [
        'max_age' => 1448,
        'requests_with_cookies_enabled' => true
    ],
    'cnames' => [
        "cname.your-domain.com"
    ],
    'geo_protection' => [
        'countries' => ['UK'],
        'type' => 'passlist'
    ],
    'headers' => [
        'cors_enabled' => true,
        'host_header_forwarding_enabled' => true
    ],
    'hotlink_protection' => [
        'domains' => ["some-domain.com"],
        'type' => 'passlist',
        'empty_referer_denied' => true
    ],
    'https_redirect' => [
        'code' => 301,
        'enabled' => true
    ],
    'instant_ssl' => [
        'enabled' => true
    ],
    'ip_protection' => [
        'ips' => ["8.8.8.8"],
        'type' => 'passlist'
    ],
    'label' => 'My cdn',
    'mp4_pseudo_streaming' => [
        'enabled' => true
    ],
    'origin_id' => 'e56564d1-8d3e-4457-93a6-082b054bc736',
    'query_string' => [
        'parameters' => ["utm"],
        'ignore_type' => 'all'
    ],
    'quic' => [
        'enabled' => true,
    ],
    'secure_token' => [
        'token' => 'T9WQQX4SV5',
        'type' => 'parameter'
    ],
    'waf' => [
        'enabled' => true
    ]
));

// Delete resource
$client->cdnResource->delete('cdn_id');

// List of CNAMEs
$client->cdnResource->getListCnames('cdn_id');

// Add CNAME
$client->cdnResource->createCname('cdn_id', array(
    "cname" => "test.cname.com"
));

// Enable Datacenters
$client->cdnResource->enableDatacenters('cdn_id', array("65b63934-2278-40aa-affa-f4c0d1e7c029")); // [uuid] array of strings, format uuid

// List of Datacenters
$client->cdnResource->getListDatacenter('cdn_id');
