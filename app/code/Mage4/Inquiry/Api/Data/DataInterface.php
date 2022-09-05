<?php

namespace Mage4\Inquiry\Api\Data;

interface DataInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID                    = 'id';
    const NAME             = 'name';
    const DOB                 = 'dob';
    const EMAIL                 = 'email';
    const OCCUPATION               = 'occupation';
    const ACTIVITIES            = 'activities';


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
     * Get Dob
     *
     * @return string
     */
    public function getDob();

    /**
     * Set Dob
     *
     * @param $dob
     * @return mixed
     */
    public function setDob($dob);

    /**
     * Get Occupation
     *
     * @return mixed
     */
    public function getOccupation();

    /**
     * Set Occupation
     *
     * @param $occupation
     * @return mixed
     */
    public function setOccupation($occupation);

    /**
     * Get Activities
     *
     * @return string
     */
    public function getActivities();

    /**
     * Set Activities
     *
     * @param $activities
     * @return mixed
     */
    public function setActivities($activities);
}
