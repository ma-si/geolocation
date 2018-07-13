<?php

/**
 * Geolocation (http://mateuszsitek.com/projects/geolocation)
 *
 * @copyright Copyright (c) 2017-2018 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\Geolocation\Adapter;

interface AdapterInterface
{
    /**
     * Performs API call attempt
     *
     * @param string $ipAddress
     * @return \Aist\Geolocation\Entity\Location
     */
    public function get($ipAddress);
}
