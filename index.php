<?php
require_once __DIR__ . '/vendor/autoload.php';

use PhpCrawler\HttpRequestAsier;
use GuzzleHttp\Client;
$url = 'http://www.procyclingstats.com';

$client = new Client();
$subscriber = new \PhpCrawler\Event\SimpleSubscriber();
$httpRequest = new HttpRequestAsier($client,$subscriber);

$httpRequest->createAsyncRequestPool([$url,$url]);
$httpRequest->sendAsyncRequestPool();