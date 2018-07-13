<?php

/**
 * Geolocation (http://mateuszsitek.com/projects/geolocation)
 *
 * @copyright Copyright (c) 2017-2018 DIGITAL WOLVES LTD (http://digitalwolves.ltd) All rights reserved.
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 */

namespace Aist\Geolocation\Entity;

class Location
{
    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $continentCode;

    /**
     * @var string
     */
    protected $continentName;

    /**
     * @var string
     */
    protected $countryCode;

    /**
     * @var string
     */
    protected $countryFlag;

    /**
     * @var string
     */
    protected $countryName;

    /**
     * @var string
     */
    protected $regionCode;

    /**
     * @var string
     */
    protected $regionName;

    /**
     * @var string
     */
    protected $zip;

    /**
     * @var float
     */
    protected $latitude;

    /**
     * @var float
     */
    protected $longitude;

    /**
     * @var string
     */
    protected $ipAddress;

    /**
     * @var bool
     */
    protected $valid;

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @param bool $valid
     * @return Location
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string|null $ipAddress
     * @return Location
     */
    public function setIpAddress($ipAddress = null)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     * @return Location
     */
    public function setCity($city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContinentCode()
    {
        return $this->continentCode;
    }

    /**
     * @param string|null $continentCode
     * @return Location
     */
    public function setContinentCode($continentCode = null)
    {
        $this->continentCode = $continentCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContinentName()
    {
        return $this->continentName;
    }

    /**
     * @param string|null $continentName
     * @return Location
     */
    public function setContinentName($continentName = null)
    {
        $this->continentName = $continentName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string|null $countryCode
     * @return Location
     */
    public function setCountryCode($countryCode = null)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountryFlag()
    {
        return $this->countryFlag;
    }

    /**
     * @param string|null $countryFlag
     * @return Location
     */
    public function setCountryFlag($countryFlag = null)
    {
        $this->countryFlag = $countryFlag;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @param string|null $countryName
     * @return Location
     */
    public function setCountryName($countryName = null)
    {
        $this->countryName = $countryName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRegionCode()
    {
        return $this->regionCode;
    }

    /**
     * @param string|null $regionCode
     * @return Location
     */
    public function setRegionCode($regionCode = null)
    {
        $this->regionCode = $regionCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRegionName()
    {
        return $this->regionName;
    }

    /**
     * @param string|null $regionName
     * @return Location
     */
    public function setRegionName($regionName = null)
    {
        $this->regionName = $regionName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param string|null $zip
     * @return Location
     */
    public function setZip($zip = null)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float|null $latitude
     * @return Location
     */
    public function setLatitude($latitude = null)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float|null $longitude
     * @return Location
     */
    public function setLongitude($longitude = null)
    {
        $this->longitude = $longitude;

        return $this;
    }
}
