<?php

/**
 * Geolocation (http://mateuszsitek.com/projects/geolocation)
 *
 * @copyright Copyright (c) 2017-2018 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Test\Aist\Geolocation\Service;

use Aist\Geolocation\Service\GeolocationService;
use Aist\Geolocation\Service\GeolocationServiceFactory;
use Interop\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;

class GeolocationServiceFactoryTest extends TestCase
{
    private function createContainer()
    {
        $adapter = $this->prophesize(\Aist\Geolocation\Adapter\AdapterInterface::class);
        $container = $this->prophesize(ContainerInterface::class);
        $container->get(\Aist\Geolocation\Adapter\AdapterInterface::class)->will(function () use ($adapter) {
            return $adapter->reveal();
        });
        return $container->reveal();
    }

    public function testReturnsGeolocationService()
    {
        $factory = new GeolocationServiceFactory();
        $result = $factory($this->createContainer(), GeolocationService::class);
        $this->assertInstanceOf(GeolocationService::class, $result);
    }
}
