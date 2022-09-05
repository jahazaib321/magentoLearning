<?php

namespace Mage4\StoreLocator\Controller\Adminhtml\Category;

use Magento\Backend\App\Action\Context;
use Mage4\StoreLocator\Model\CategoryFactory;

class Save extends \Magento\Backend\App\Action
{
    private $itemFactory;

    public function __construct(
        Context $context,
        CategoryFactory $itemFactory
    ) {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }



    public function execute()
    {
        $this->itemFactory->create()
            ->setData($this->getRequest()->getPostValue('store_locator_category_form'))
            ->save();
        exit();
        return $this->resultRedirectFactory->create()->setPath('storelocator/index/category');
    }
}
