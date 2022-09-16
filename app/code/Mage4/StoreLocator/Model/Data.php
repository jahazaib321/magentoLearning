<?php

namespace Mage4\StoreLocator\Model;

use Magento\Framework\Model\AbstractModel;
use Mage4\StoreLocator\Api\Data\DataInterface;

class Data extends AbstractModel implements DataInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'Mage4_StoreLocator';

    /**
     * Initialise resource model
     * @codingStandardsIgnoreStart
     */
    protected function _construct()
    {
        // @codingStandardsIgnoreEnd
        $this->_init('Mage4\StoreLocator\Model\ResourceModel\Item');
    }

    /**
     * Get cache identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get Id
     *
     * @return string
     */
    public function getId()
    {
        return $this->getData(DataInterface::ID);
    }

    /**
     * Set Id
     *
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(DataInterface::ID, $id);
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getData(DataInterface::NAME);
    }

    /**
     * Set name
     *
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData(DataInterface::NAME, $name);
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->getData(DataInterface::COUNTRY);
    }

    /**
     * Set country
     *
     * @param $country
     * @return $this
     */
    public function setCountry($country)
    {
        return $this->setData(DataInterface::EMAIL, $country);
    }

    /**
     * Get State
     *
     * @return string
     */
    public function getState()
    {
        return $this->getData(DataInterface::STATE);
    }

    /**
     * Set State
     *
     * @param $state_id
     * @return $this
     */
    public function setState($state_id)
    {
        return $this->setData(DataInterface::STATE, $state_id);
    }

    /**
     * Get City
     *
     * @return string
     */
    public function getCity()
    {
        return $this->getData(DataInterface::CITY);
    }

    /**
     * Set City
     *
     * @param $city
     * @return $this
     */
    public function setCity($city)
    {
        return $this->setData(DataInterface::CITY, $city);
    }

    /**
     * Get Zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->getData(DataInterface::ZIP);
    }

    /**
     * Set Zip
     *
     * @param $zip
     * @return $this
     */
    public function setZip($zip)
    {
        return $this->setData(DataInterface::ZIP, $zip);
    }

    /**
     * Get Street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->getData(DataInterface::STREET);
    }

    /**
     * Set Street
     *
     * @param $street
     * @return $this
     */
    public function setStreet($street)
    {
        return $this->setData(DataInterface::STREET, $street);
    }

    /**
     * Get Latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->getData(DataInterface::LATITUDE);
    }

    /**
     * Set Latitude
     *
     * @param $lat
     * @return $this
     */
    public function setLatitude($lat)
    {
        return $this->setData(DataInterface::LATITUDE, $lat);
    }

    /**
     * Get Longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->getData(DataInterface::LONGITUDE);
    }

    /**
     * Set Longitude
     *
     * @param $lng
     * @return $this
     */
    public function setLongitude($lng)
    {
        return $this->setData(DataInterface::LONGITUDE, $lng);
    }

    /**
     * Get Phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->getData(DataInterface::PHONE);
    }

    /**
     * Set Phone
     *
     * @param $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        return $this->setData(DataInterface::PHONE, $phone);
    }

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getData(DataInterface::EMAIL);
    }

    /**
     * Set Email
     *
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        return $this->setData(DataInterface::EMAIL, $email);
    }

    /**
     * Get Zip
     *
     * @return string
     */
    public function getImage()
    {
        return $this->getData(DataInterface::IMAGE);
    }

    /**
     * Set IMAGE
     *
     * @param $image
     * @return $this
     */
    public function setImage($image)
    {
        return $this->setData(DataInterface::IMAGE, $image);
    }

}

