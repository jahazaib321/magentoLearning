<?php

namespace Mage4\Inquiry\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Item extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('mage4_inquiry', 'id');
    }
}
