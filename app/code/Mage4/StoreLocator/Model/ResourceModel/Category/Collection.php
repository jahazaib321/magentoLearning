<?php

namespace Mage4\StoreLocator\Model\ResourceModel\Category;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Mage4\StoreLocator\Model\Category;
use Mage4\StoreLocator\Model\ResourceModel\Category as CategoryResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(Category::class, CategoryResource::class);
    }
}
