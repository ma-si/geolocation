<?php

/**
 * Geolocation (http://mateuszsitek.com/projects/geolocation)
 *
 * @copyright Copyright (c) 2017-2018 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\Geolocation\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class GeolocationServiceFactory :factory:
 */
class GeolocationServiceFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return GeolocationService
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $adapter = $container->get(\Aist\Geolocation\Adapter\AdapterInterface::class);
        $service = new GeolocationService();
        $service->setAdapter($adapter);

        return $service;
    }

    /**
     * Backwards-compatibility
     *
     * @param ServiceLocatorInterface $container
     * @return GeolocationService
     */
    public function createService(ServiceLocatorInterface $container)
    {
        return $this($container, GeolocationService::class);
    }
}
