<?php

/**
 * Geolocation (http://mateuszsitek.com/projects/geolocation)
 *
 * @copyright Copyright (c) 2017-2018 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\Geolocation\Event;

use Aist\Geolocation\Service\GeolocationService;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;

/**
 * Location Listener
 */
class LocationListener implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;

    /**
     * Attach to an event manager
     *
     * @param  EventManagerInterface $events
     * @param  int $priority
     * @return void
     */
    public function attach(EventManagerInterface $events, $priority = 1000)
    {
        $this->listeners[] = $events->getSharedManager()->attach(
            '*',
            MvcEvent::EVENT_BOOTSTRAP,
            [$this, 'onBootstrap'],
            $priority
        );
    }

    /**
     * Listen to the "bootstrap" event and attempt to locate request
     *
     * @param EventInterface $event
     */
    public function onBootstrap(EventInterface $event)
    {
        $serviceManager = $event->getApplication()->getServiceManager();
        $ipAddress = $this->getIp($serviceManager);

        $geolocationService = $serviceManager->get(GeolocationService::class);
        $location = $geolocationService->getLocation();
        if (! $location || $ipAddress !== $location->getIpAddress()) {
            $geolocationService->locate($ipAddress);
        }
    }

    /**
     * Obtain IP address from the request
     *
     * @param ServiceManager $serviceManager
     * @return string
     */
    private function getIp(ServiceManager $serviceManager)
    {
        $request = $serviceManager->get('request');
        $server = $request->getServer();

        return $server->get('HTTP_CLIENT_IP') ? :
            $server->get('HTTP_X_FORWARDED_FOR') ? :
                $server->get('HTTP_X_FORWARDED') ? :
                    $server->get('HTTP_FORWARDED_FOR') ? :
                        $server->get('HTTP_FORWARDED') ? :
                            $server->get('REMOTE_ADDR') ? :
                                'UNKNOWN'
        ;
    }
}
