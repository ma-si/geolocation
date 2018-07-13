<?php

/**
 * Geolocation (http://mateuszsitek.com/projects/geolocation)
 *
 * @copyright Copyright (c) 2017-2018 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\Geolocation\Service;

use Aist\Geolocation\Entity\Location;

/**
 * Provides an API for geolocation management
 */
interface GeolocationServiceInterface
{
    /**
     * Locate IP and provides an location result
     *
     * @param string $ipAddress
     * @return Location
     */
    public function locate($ipAddress);

    /**
     * Returns true if and only if an location is available
     *
     * @return bool
     */
    public function hasLocation();

    /**
     * Returns the location or null if is not available
     *
     * @return Location|null
     */
    public function getLocation();

    /**
     * Clears the location
     *
     * @return void
     */
    public function clearLocation();
}
