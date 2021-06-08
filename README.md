Library mafikes/cdn77api
------------
PHP Client for communication with [cdn77.com](https://client.cdn77.com/support/api-docs/v2/account).

Install
------------
```
composer require mafikes/cdn77api
```

Example
------------
Examples could be found in examples folder.

#### Create client
```php
use \Mafikes\Cdn77Api\Client;
$client = new Client('yourLoginEmail', 'yourTokenFromAdministration');
```

### How get data from API
Functions in client are similar to original functions from API. 
More [CDN77](https://client.cdn77.com/support/api-docs/v2/account).

### API structure 

- [Account](#get-my-profile)
- [Billing Overview](#billing-overview)
- [CDN Resource](#cdn-resource)
- [Data Management](#data-management)
- [Data Queue](#data-queue)
- [Raw Logs](#raw-logs)
- [Report](#report)
- [Storage](#storage)

#### Get my profile
```php
$client->profile->getMe();
```

#### Billing Overview
```php
$client->billing->getDetails();
```

#### CDN Resource
```php
/ Create new resource
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
```

#### Data Management
```php
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
```

#### Data Queue
```php
// Doc: https://client.cdn77.com/support/api-docs/v2/data-queue

// Retrieve a list of purge and prefetch requests. You will receive last 1000 requests.
$client->dataQueue->getListAll();
$client->dataQueue->getListAll('prefetch'); // Type of request. Valid values: 'prefetch' | 'purge'

$client->dataQueue->getList(2170); // Get all by resource ID
$client->dataQueue->getList(2170, 'prefetch'); // Get by resource ID and type 'prefetch' | 'purge'

// Get details for a particular request.
$client->dataQueue->getDetail(65532);

// List the URLS for a particular request.
$client->dataQueue->getListUrl(2170, 65532);
```

#### Raw Logs
```php
// Doc: https://client.cdn77.com/support/api-docs/v2/raw-logs
$client->rawLogs->getFiles();

$client->rawLogs->download(2170, '07Jun20.gz');
```

#### Report
```php
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
```

#### Storage
```php
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
```

---

I hope this package help you. You could donate me via PayPal: mafikes@gmail.com
