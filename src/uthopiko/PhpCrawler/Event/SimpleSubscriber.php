<?php
namespace PhpCrawler\Event;

use GuzzleHttp\Event\EmitterInterface;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Event\BeforeEvent;
use GuzzleHttp\Event\CompleteEvent;

class SimpleSubscriber implements SubscriberInterface
{
    public function getEvents()
    {
        return [
            'complete' => ['onComplete']
        ];
    }

    public function onBefore(BeforeEvent $event, $name)
    {

    }

    public function onComplete(CompleteEvent $event, $name)
    {
        echo 'Complete!';
    }
}