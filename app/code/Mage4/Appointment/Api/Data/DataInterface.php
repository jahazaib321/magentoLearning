<?php

namespace Mage4\Appointment\Api\Data;

interface DataInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID                    = 'id';
    const NAME             = 'name';
    const PHONE                 = 'phone';
    const EMAIL                 = 'email';
    const COMMENT               = 'comment';
    const CREATED_AT            = 'created_at';
    const DATE                 = 'date';
    const STORE                 = 'store';


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
     * Get Comment
     *
     * @return mixed
     */
    public function getComment();

    /**
     * Set Comment
     *
     * @param $comment
     * @return mixed
     */
    public function setComment($comment);

    /**
     * Get created at
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * set created at
     *
     * @param $createdAt
     * @return DataInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get Date
     *
     * @return string
     */
    public function getDate();

    /**
     * Set Date
     *
     * @param $date
     * @return mixed
     */
    public function setDate($date);

    /**
     * Get Store
     *
     * @return string
     */
    public function getStore();

    /**
     * Set Store
     *
     * @param $store
     * @return mixed
     */
    public function setStore($store);
}
