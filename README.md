PHP Library cdn77 api v3
------------
PHP Client for communication with v3 [cdn77.com](https://client.cdn77.com/support/api-docs/v3/introduction).

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
$client = new Client('your_token_here');

// full example 
use \Mafikes\Cdn77Api\Client;
$client = new Client('mySecretTokenBla12121212');
var_dump($client->cdnResource->getDetail(123139340032));
```

### How get data from API
Functions in client are similar to original functions from API CDN77. [Go to official documentation](https://client.cdn77.com/support/api-docs/v3/introduction).

### API structure 

- [CDN Resource](#cdn-resources)
- [Billing](#billing)
- [Jobs](#jobs)
- [Raw Logs](#raw-logs)
- [Statistics](#statistics) (All functions not implemented yet)
- [Storage Location](#storage-location)

### CDN Resources
[Official documentation of cdn resources](https://client.cdn77.com/support/api-docs/v3/cdn-resources)
#### Get list of avalaible resources
```php
$client->cdnResource->getList();
```

#### Get list of avalaible resources
```php
$client->cdnResource->create([
    // All CNAMEs should be mapped via DNS to CDN URL. Otherwise it's not possible to generate SSL certificate. Maximum number of CNAMEs is "10". To add more, contact our support.
    'cnames' => [
        'cname.your-domain.com'
    ],
    // The label helps you to identify your CDN Resource.
    'label' => 'My cdn',
    // ID of attached Origin (content source for CDN Resource). More information in our Origin API documentation.
    'origin_id' => 'e56564d1-8d3e-4457-93a6-082b054bc736'
]); 
```

#### Detail of CDN Resource
```php
$client->cdnResource->getDetail('cdn_id');
```

#### Edit CDN Resource
This is only example, not all data must be included. More in [official documentation](https://client.cdn77.com/support/api-docs/v3/cdn-resources#edit-cdn-resource).
```php
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
```

#### Delete CDN Resource
```php
$client->cdnResource->delete('cdn_id');
```

#### List of CNAMEs
```php
$client->cdnResource->getListCnames('cdn_id');
```

#### Add CNAME
```php
$client->cdnResource->createCname('cdn_id', [
    "cname" => "test.cname.com"
]);
```

#### Enable Datacenters
```php
$client->cdnResource->enableDatacenters('cdn_id', array("65b63934-2278-40aa-affa-f4c0d1e7c029")); // [uuid] array of strings, format uuid
```

#### List of Datacenters
```php
$client->cdnResource->getListDatacenter('cdn_id');
```

### Billing 
[Official documentation of billing](https://client.cdn77.com/support/api-docs/v3/billing)

#### Credit balance
```php
$client->billing->getDetails();
```

### Jobs
[Official documentation of jobs](https://client.cdn77.com/support/api-docs/v3/jobs)

#### List of jobs
Returns a filtered list of jobs for a given CDN Resource and type.
```php
$client->job->getList('cdn_id', $client->job::JOB_TYPE_PREFETCH);

// All types of jobs
$client->job::JOB_TYPE_PURGE
$client->job::JOB_TYPE_PREFETCH
$client->job::JOB_TYPE_PURGE_ALL
```

#### Detail of job
Returns detailed information regarding particular data manipulation API request.
```php
$client->job->getDetail('cdn_id', 'job_id');
```

#### Prefetch
Allows you to prepopulate certain files into CDN cache on all datacenters. Useful for reducing load on your origin server coming from a new content.
```php
$client->job->prefetch('cdn_id', [
    // List of file paths, that are being processed in the job.
    'paths' => [
        'img/my-image.png',
        'img/second-image.jpg'
    ],
    // Use when host header forwarding is active on your CDN Resource.
    'upstream_host' => 'your-domain.com'
]);
```

#### Purge
Allows you to rotate certain files out of the cache. Particularly useful to prevent stale response.
```php
$client->job->purge('cdn_id', [
    'paths' => [
        'img/my-image.png',
        'img/background.jpg'
    ]
]);
```

#### Purge all
Allows you to instantly remove all cached content from all datacenters.
```php
$client->job->purgeAll('cdn_id');
```

### Origin
[Official documentation of origin](https://client.cdn77.com/support/api-docs/v3/origin)

#### List of Origins
```php
$client->origin->getList();
```

#### Create Your Origin
```php
$client->origin->create([
    "base_dir" => "/pictures/images/",
    "label" => "My URL Origin",
    "port" => 8080,
    "scheme" => "https",
    "host" => "my-domain.com"
]);
```

#### Detail of Your Origin
```php
$client->origin->getDetail('origin_id');
```

#### Edit Origin
Change of origin affects all your assigned CDN Resources.
```php
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
```

#### Delete Origin
```php
$client->origin->delete('origin_id');
```

#### Create AWS Origin
```php
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
```

### Raw Logs
[Official documentation of row logs](https://client.cdn77.com/support/api-docs/v3/raw-logs)

#### List of CDN Resource Raw Logs
```php
$client->rawLogs->getList();
```

#### Activate Raw Logs for CDN Resource
```php
$client->rawLogs->activateRawLog('cdn_id');
```

#### Deactivate Raw Logs for CDN Resource
```php
$client->rawLogs->deactivateRawLog('cdm_id');
```

#### Download Daily Raw Log files for CDN Resource
```php
$client->rawLogs->download('cdn_id', 'fileName');
```

### Statistics
[Official documentation of statistics](https://client.cdn77.com/support/api-docs/v3/statistics)

#### Get stats
```php
$dateFrom = new DateTime('2020-01-01');
$dateTo = new DateTime('2020-08-06');

//$client->stats->get($type, $dateFrom, $dateTo, $cdnIds = null, $locationIds = null, $aggregation = null)
$client->stats->get($client->stats::TYPE_BANDWIDTH, $dateFrom->getTimestamp(), $dateTo->getTimestamp());

// All Types
$client->stats::TYPE_BANDWIDTH
$client->stats::TYPE_COSTS
$client->stats::TYPE_HEADERS
$client->stats::TYPE_HEADERS_DETAIL
$client->stats::TYPE_HIT_MISS
$client->stats::TYPE_HIT_MISS_DETAIL
$client->stats::TYPE_TRAFFIC
$client->stats::TYPE_TRAFFIC_DETAIL
$client->stats::TYPE_TRAFFIC_MISS
```

### Storage Location
[Official documentation of storage location](https://client.cdn77.com/support/api-docs/v3/storage-location)

#### List of Storage Locations
```php
$client->storage->getList();
```

#### Detail of Storage Location
```php
$client->storage->detail('storage_id');
```

---

I hope this package help you. You could donate me via [PayPal](https://www.paypal.com/donate/?hosted_button_id=D9DZ3LYZRH888).
