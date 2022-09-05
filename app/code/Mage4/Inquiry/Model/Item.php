<?php

namespace Mage4\Inquiry\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Mage4\Inquiry\Model\ResourceModel\Item::class);
    }
}
