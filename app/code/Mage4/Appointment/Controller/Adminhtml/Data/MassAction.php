<?php

namespace Mage4\Appointment\Controller\Adminhtml\Data;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Ui\Component\MassAction\Filter;
use Mage4\Appointment\Api\DataRepositoryInterface;
use Mage4\Appointment\Controller\Adminhtml\Data;
use Mage4\Appointment\Model\Data as DataModel;
use Mage4\Appointment\Model\ResourceModel\Data\CollectionFactory;

abstract class MassAction extends Data
{
    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var DataRepositoryInterface
     */
    protected $dataRepository;

    /**
     * @var ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @var string
     */
    protected $successMessage;

    /**
     * @var string
     */
    protected $errorMessage;

    /**
     * MassAction constructor.
     *
     * @param Filter $filter
     * @param Registry $registry
     * @param DataRepositoryInterface $dataRepository
     * @param PageFactory $resultPageFactory
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     * @param ForwardFactory $resultForwardFactory
     * @param $successMessage
     * @param $errorMessage
     */
    public function __construct(
        Filter $filter,
        Registry $registry,
        DataRepositoryInterface $dataRepository,
        PageFactory $resultPageFactory,
        Context $context,
        CollectionFactory $collectionFactory,
        ForwardFactory $resultForwardFactory,
        $successMessage,
        $errorMessage
    ) {
        $this->filter               = $filter;
        $this->dataRepository       = $dataRepository;
        $this->collectionFactory    = $collectionFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        $this->successMessage       = $successMessage;
        $this->errorMessage         = $errorMessage;
        parent::__construct($registry, $dataRepository, $resultPageFactory, $resultForwardFactory, $context);
    }

    /**
     * @param DataModel $data
     * @return mixed
     */
    abstract protected function massAction(DataModel $data);

    /**
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $collectionSize = $collection->getSize();
            foreach ($collection as $data) {
                $this->massAction($data);
            }
            $this->messageManager->addSuccessMessage(__($this->successMessage, $collectionSize));
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addExceptionMessage($e, __($this->errorMessage));
        }
        $redirectResult = $this->resultRedirectFactory->create();
        $redirectResult->setPath('appointment/data/index');
        return $redirectResult;
    }
}
