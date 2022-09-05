<?php
namespace Mage4\Inquiry\Controller\Adminhtml\Manage;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class DeleteAction extends Action
{
    public $blogFactory;

    public function __construct(
        Context $context,
        \Mage4\Inquiry\Model\itemFactory $itemFactory
    ) {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        try {
            $blogModel = $this->itemFactory->create();
            $blogModel->load($id);
            $blogModel->delete();
            $this->messageManager->addSuccessMessage(__('You deleted the record.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        return $resultRedirect->setPath('inquiry/index/index');
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mage4_Inquiry::delete');
    }
}
