<?php

namespace Mage4\StoreLocator\Controller\Adminhtml\Item;

use Magento\Framework\Controller\ResultFactory;

class EditAction extends \Magento\Backend\App\Action
{
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}

