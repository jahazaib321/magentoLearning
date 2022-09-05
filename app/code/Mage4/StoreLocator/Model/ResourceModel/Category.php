<?php

namespace Mage4\StoreLocator\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Category extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('mage4_storelocator_managecategory;', 'id');
    }
}
