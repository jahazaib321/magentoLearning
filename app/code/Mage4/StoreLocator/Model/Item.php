<?php

namespace Mage4\StoreLocator\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Mage4\StoreLocator\Model\ResourceModel\Item::class);
    }
}

