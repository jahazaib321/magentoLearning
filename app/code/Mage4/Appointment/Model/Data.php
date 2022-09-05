<?php

namespace Mage4\Appointment\Model;

use Magento\Framework\Model\AbstractModel;
use Mage4\Appointment\Api\Data\DataInterface;

class Data extends AbstractModel implements DataInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'Mage4_Appointment';

    /**
     * Initialise resource model
     * @codingStandardsIgnoreStart
     */
    protected function _construct()
    {
        // @codingStandardsIgnoreEnd
        $this->_init('Mage4\Appointment\Model\ResourceModel\Data');
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
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getData(DataInterface::EMAIL);
    }

    /**
     * Set email
     *
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        return $this->setData(DataInterface::EMAIL, $email);
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->getData(DataInterface::PHONE);
    }

    /**
     * Set phone
     *
     * @param $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        return $this->setData(DataInterface::PHONE, $phone);
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->getData(DataInterface::COMMENT);
    }

    /**
     * Set comment
     *
     * @param $comment
     * @return $this
     */
    public function setComment($comment)
    {
        return $this->setData(DataInterface::COMMENT, $comment);
    }

    /**
     * Get created at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(DataInterface::CREATED_AT);
    }

    /**
     * Set created at
     *
     * @param $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(DataInterface::CREATED_AT, $createdAt);
    }

    /**
     * Get Date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->getData(DataInterface::DATE);
    }

    /**
     * Set Date
     *
     * @param $date
     * @return $this
     */
    public function setDate($date)
    {
        return $this->setData(DataInterface::DATE, $date);
    }

    /**
     * Get Store
     *
     * @return string
     */
    public function getStore()
    {
        return $this->getData(DataInterface::DATE);
    }

    /**
     * Set Store
     *
     * @param $store
     * @return $this
     */
    public function setStore($store)
    {
        return $this->setData(DataInterface::STORE, $store);
    }

}
