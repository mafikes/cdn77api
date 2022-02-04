<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \Mafikes\Cdn77Api\Client;

// Client Register
$client = new Client('your_token_here');

// Returns a filtered list of jobs for a given CDN Resource and type.
$client->job->getList('cdn_id', $client->job::JOB_TYPE_PREFETCH);

// Detail
$client->job->getDetail('cdn_id', 'job_id');

// Allows you to prepopulate certain files into CDN cache on all datacenters. Useful for reducing load on your origin server coming from a new content.
$client->job->prefetch('cdn_id', array(
    // List of file paths, that are being processed in the job.
    'paths' => [
        'img/my-image.png',
        'img/second-image.jpg'
    ],
    // Use when host header forwarding is active on your CDN Resource.
    'upstream_host' => 'your-domain.com'
));

// Allows you to rotate certain files out of the cache. Particularly useful to prevent stale response.
$client->job->purge('cdn_id', array(
    'paths' => [
        'img/my-image.png',
        'img/background.jpg'
    ]
));

// Allows you to instantly remove all cached content from all datacenters.
$client->job->purgeAll('cdn_id');




