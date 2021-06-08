<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \Mafikes\Cdn77Api\Client;

// Client Register
$client = new Client('yourLoginEmail', 'yourTokenFromAdministration');

// Create new resource
// Doc: https://client.cdn77.com/support/api-docs/v2/cdn-resource#create
$client->cdnResource->create(array(
    'label' => 'Testing', // required / Your own label of a CDN Resource.
    'type' => 'standard', // required / Valid values: 'standard' | 'video'
    'origin_scheme' => 'https', // URL scheme of the Origin. Valid values: 'http' | 'https'
    'origin_url' => 'example.com', // URL of your content source (Origin). Doesn't have to be set when CDN Storage Id is set (that means instead of using your own URL you use our CDN Storage).
));

// Edit resource
// Doc: https://client.cdn77.com/support/api-docs/v2/cdn-resource#edit
$client->cdnResource->edit(12313, array(
    'label' => 'Testing2',
));

// Delete resource
$client->cdnResource->delete(216955);

// Get detail of resource
$client->cdnResource->getDetail(216148); // Return detail data of Resrouce

// Get list of avalaible resources
$resources = $client->cdnResource->getList();

if (array_key_exists('cdnResources', $resources)) {
    foreach ($resources->cdnResources as $resource) {
        var_dump($resource->id, $resource->origin_url);
//        var_dump($resource);
    }
}


