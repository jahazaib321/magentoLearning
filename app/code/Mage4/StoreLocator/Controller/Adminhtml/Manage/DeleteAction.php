<?php
namespace Mage4\StoreLocator\Controller\Adminhtml\Manage;

use Exception;
use Mage4\StoreLocator\Model\ItemFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class DeleteAction extends Action
{
    public $blogFactory;

    public function __construct(
        Context $context,
        ItemFactory $ItemFactory
    ) {
        $this->ItemFactory = $ItemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        try {
            $blogModel = $this->ItemFactory->create();
            $blogModel->load($id);
            $blogModel->delete();
            $this->messageManager->addSuccessMessage(__('You deleted the record.'));
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        return $resultRedirect->setPath('storelocator/index/index');
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mage4_StoreLocator::delete');
    }
}
