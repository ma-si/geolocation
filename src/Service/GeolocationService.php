<?php

/**
 * Geolocation (http://mateuszsitek.com/projects/geolocation)
 *
 * @copyright Copyright (c) 2017-2018 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\Geolocation\Service;

use Aist\Geolocation\Adapter\AdapterInterface;
use Aist\Geolocation\Entity\Location;
use Aist\Geolocation\Exception\RuntimeException;
use Aist\Geolocation\Storage\StorageInterface;

/**
 * Geolocation Service
 */
class GeolocationService implements GeolocationServiceInterface
{
    /**
     * Persistent storage handler
     *
     * @var StorageInterface
     */
    protected $storage = null;

    /**
     * Geolocation adapter
     *
     * @var AdapterInterface
     */
    protected $adapter = null;

    /**
     * Constructor
     *
     * @param StorageInterface $storage
     * @param AdapterInterface $adapter
     */
    public function __construct(StorageInterface $storage = null, AdapterInterface $adapter = null)
    {
        if (null !== $storage) {
            $this->setStorage($storage);
        }
        if (null !== $adapter) {
            $this->setAdapter($adapter);
        }
    }

    /**
     * Returns the geolocation adapter
     *
     * The adapter does not have a default if the storage adapter has not been set.
     *
     * @return AdapterInterface|null
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * Sets the authentication adapter
     *
     * @param  AdapterInterface $adapter
     * @return GeolocationService Provides a fluent interface
     */
    public function setAdapter(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;

        return $this;
    }

    /**
     * Returns the persistent storage handler
     *
     * Session storage is used by default unless a different storage adapter has been set.
     *
     * @return StorageInterface
     */
    public function getStorage()
    {
        if (null === $this->storage) {
            $this->setStorage(new \Aist\Geolocation\Storage\Session());
        }

        return $this->storage;
    }

    /**
     * Sets the persistent storage handler
     *
     * @param  StorageInterface $storage
     * @return GeolocationService Provides a fluent interface
     */
    public function setStorage(StorageInterface $storage)
    {
        $this->storage = $storage;

        return $this;
    }

    /**
     * Locate IP against the adapter
     *
     * @param  string $ipAddress
     * @return Location
     * @throws RuntimeException
     */
    public function locate($ipAddress)
    {
        if (! $this->getAdapter()) {
            throw new RuntimeException('An adapter must be set prior to calling locate()');
        }

        /**
         * ZF-7546 - prevent multiple successive calls from storing inconsistent results
         * Ensure storage has clean state
         */
        if ($this->hasLocation()) {
            $this->clearLocation();
        }

        $result = $this->getAdapter()->get($ipAddress);

        $this->getStorage()->write($result);

        return $result;
    }

    /**
     * Returns true if and only if a location is available from storage
     *
     * @return bool
     */
    public function hasLocation()
    {
        return ! $this->getStorage()->isEmpty();
    }

    /**
     * Returns the location from storage or null if no identity is available
     *
     * @return mixed|null
     */
    public function getLocation()
    {
        $storage = $this->getStorage();

        if ($storage->isEmpty()) {
            return;
        }

        return $storage->read();
    }

    /**
     * Clears the location from persistent storage
     *
     * @return void
     */
    public function clearLocation()
    {
        $this->getStorage()->clear();
    }
}
