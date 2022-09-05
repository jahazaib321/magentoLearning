<?php

namespace Mage4\StoreLocator\Controller\Adminhtml\Item;

use Mage4\StoreLocator\Model\ItemFactory;

class Save extends \Magento\Backend\App\Action
{
    private $itemFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        ItemFactory $itemFactory
    ) {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->itemFactory->create()
            ->setData($this->getRequest()->getPostValue('store_locator_form'))
            ->save();
        return $this->resultRedirectFactory->create()->setPath('storelocator/index/index');
    }
}
