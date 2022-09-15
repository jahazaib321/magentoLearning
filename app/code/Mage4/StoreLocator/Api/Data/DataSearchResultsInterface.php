<?php

namespace Mage4\StoreLocator\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface DataSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get data list.
     *
     * @return \Mage4\StoreLocator\Api\Data\DataInterface[]
     */
    public function getItems();

    /**
     * Set data list.
     *
     * @param \Mage4\StoreLocator\Api\Data\DataInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

