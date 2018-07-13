<?php

/**
 * Geolocation (http://mateuszsitek.com/projects/geolocation)
 *
 * @copyright Copyright (c) 2017-2018 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

use Aist\Geolocation\Event\LocationListener;
use Aist\Geolocation\Service\GeolocationService;
use Aist\Geolocation\Service\GeolocationServiceFactory;

return [
    'session_containers' => [
        'geolocation',
    ],
    'service_manager' => [
        'factories' => [
            GeolocationService::class => GeolocationServiceFactory::class,
        ],
        'invokables' => [
            LocationListener::class => LocationListener::class,
        ],
    ],
    'listeners' => [
        LocationListener::class,
    ],
];
