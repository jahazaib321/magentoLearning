<?php

namespace Mage4\StoreLocator\Controller\Adminhtml\Item;

use Mage4\StoreLocator\Model\ImageUploader;
use Mage4\StoreLocator\Model\ItemFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;

class Save extends Action
{
    private $itemFactory;
    private $imageUploader;

    public function __construct(
        Context $context,
        ItemFactory                         $itemFactory,
        ImageUploader                       $imageUploader,
        DataObjectHelper                    $dataObjectHelper
    )
    {
        $this->itemFactory = $itemFactory;
        $this->imageUploader = $imageUploader;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context);
    }

    /**
     * @throws LocalizedException
     */
    public function execute()
    {
        $data = $this->getRequest()->getParams();

        $model = $this->itemFactory->create();
        $model->load($data['id']);

        if (!$model->getId()) {
            unset($data['id']);
        }


        if ($data) {
            if (isset($data['image'][0]['name']) && isset($data['image'][0]['tmp_name'])) {
                $data['image'] = $data['image'][0]['name'];
                /** @var ImageUploader $this- >imageUploader */
                $this->imageUploader->moveFileFromTmp($data['image']);
                $this->dataObjectHelper->populateWithArray($model, $data, AbstractModel::class);
            } elseif (isset($data['image'][0]['image']) && !isset($data['image'][0]['tmp_name'])) {
                $data['image'] = $data['image'][0]['image'];
            } else {
                $data['image'] = null;
            }
            $model->setData($data)->save();
        }
        return $this->resultRedirectFactory->create()->setPath('storelocator/index/index');
    }
}
