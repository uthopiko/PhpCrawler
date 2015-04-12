<?php
/**
 * The source code of application includes a LICENSE file
 * with all information about license.
 *
 * @author Asier Ramos  <asier.boletus@gmail.com>
 */
namespace PhpCrawler;

use GuzzleHttp\Client;
use GuzzleHttp\Event\CompleteEvent;
use GuzzleHttp\Event\ErrorEvent;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Pool;

class HttpRequestAsier {


    protected $poolRequests;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;
    /**
     * @var \GuzzleHttp\Event\SubscriberInterface
     */
    private $eventSuscriber;

    function __construct(Client $client, SubscriberInterface $eventSuscriber)
    {
        $this->client = $client;
        $this->eventSuscriber = $eventSuscriber;
        $emitter = $client->getEmitter();
        $emitter->attach($eventSuscriber);

    }

    public function createAsyncRequestPool($urls)
    {
        foreach ($urls as $url)
        {
            $this->poolRequests [] = $this->client->createRequest('GET', $url);
        }
    }

    public function sendAsyncRequestPool()
    {
        $pool = new Pool($this->client,$this->poolRequests,[]);
        $pool->wait();
    }


}