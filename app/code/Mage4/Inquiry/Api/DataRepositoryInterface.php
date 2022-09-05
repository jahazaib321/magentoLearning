<?php

namespace Mage4\Inquiry\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Mage4\Inquiry\Api\Data\DataInterface;

interface DataRepositoryInterface
{

    /**
     * @param DataInterface $data
     * @return mixed
     */
    public function save(DataInterface $data);


    /**
     * @param $Id
     * @return mixed
     */
    public function getById($Id);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Mage4\Inquiry\Api\Data\DataSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param DataInterface $data
     * @return mixed
     */
    public function delete(DataInterface $data);

    /**
     * @param $Id
     * @return mixed
     */
    public function deleteById($Id);
}
