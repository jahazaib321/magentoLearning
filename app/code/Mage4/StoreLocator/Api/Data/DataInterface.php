<?php

namespace Mage4\StoreLocator\Api\Data;

interface DataInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID                    = 'id';
    const NAME             = 'name';
    const COUNTRY                 = 'country';
    const STATE                 = 'state_id';
    const CITY               = 'city';
    const ZIP            = 'zip';
    const STREET            = 'street';
    const LATITUDE            = 'lat';
    const LONGITUDE            = 'lng';
    const PHONE            = 'phone';
    const EMAIL            = 'email';
    const IMAGE            = 'image';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set ID
     *
     * @param $id
     * @return DataInterface
     */
    public function setId($id);

    /**
     * Get Name
     *
     * @return string
     */
    public function getName();

    /**
     * Set Name
     *
     * @param $name
     * @return mixed
     */
    public function setName($name);

    /**
     * Get Country
     *
     * @return string
     */
    public function getCountry();

    /**
     * Set Country
     *
     * @param $country
     * @return mixed
     */
    public function setCountry($country);

    /**
     * Get State
     *
     * @return string
     */
    public function getState();

    /**
     * Set State
     *
     * @param $state_id
     * @return mixed
     */
    public function setState($state_id);

    /**
     * Get City
     *
     * @return mixed
     */
    public function getCity();

    /**
     * Set City
     *
     * @param $city
     * @return mixed
     */
    public function setCity($city);

    /**
     * Get Zip
     *
     * @return string
     */
    public function getZip();

    /**
     * Set Zip
     *
     * @param $zip
     * @return mixed
     */
    public function setZip($zip);

    /**
     * Get Street
     *
     * @return string
     */
    public function getStreet();

    /**
     * Set Street
     *
     * @param $street
     * @return mixed
     */
    public function setStreet($street);

    /**
     * Get Latitude
     *
     * @return string
     */
    public function getLatitude();

    /**
     * Set Latitude
     *
     * @param $lat
     * @return mixed
     */
    public function setLatitude($lat);

    /**
     * Get Longitude
     *
     * @return string
     */
    public function getLongitude();

    /**
     * Set Longitude
     *
     * @param $lng
     * @return mixed
     */
    public function setLongitude($lng);

    /**
     * Get Phone
     *
     * @return string
     */
    public function getPhone();

    /**
     * Set Phone
     *
     * @param $phone
     * @return mixed
     */
    public function setPhone($phone);

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set Email
     *
     * @param $email
     * @return mixed
     */
    public function setEmail($email);

    /**
     * Get Image
     *
     * @return string
     */
    public function getImage();

    /**
     * Set Image
     *
     * @param $image
     * @return mixed
     */
    public function setImage($image);


}



