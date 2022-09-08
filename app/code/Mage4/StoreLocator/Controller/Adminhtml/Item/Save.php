<?php

namespace Mage4\StoreLocator\Controller\Adminhtml\Item;

use Mage4\StoreLocator\Model\ImageUploader;
use Mage4\StoreLocator\Model\ItemFactory;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    private $itemFactory;
    private $imageUploader;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        ItemFactory $itemFactory,
        ImageUploader $imageUploader
    ) {
        $this->itemFactory = $itemFactory;
        $this->imageUploader = $imageUploader;
        parent::__construct($context);
    }

    /**
     * @throws LocalizedException
     */
    public function execute()
    {
        $data= $this->getRequest()->getPostValue();
//        $this->itemFactory->create()->setData($this->getRequest()->getParams())->save();


        if ($data) {
            if (isset($data['image'][0]['name']) && isset($data['image'][0]['tmp_name'])) {
                $data['image'] =$data['image'][0]['name'];
                /** @var ImageUploader $this->imageUploader */
                $this->imageUploader->moveFileFromTmp($data['image']);
            } elseif (isset($data['image'][0]['image']) && !isset($data['image'][0]['tmp_name'])) {
                $data['image'] = $data['image'][0]['image'];
            } else {
                $data['image'] = null;
            }
        }
//        dd($data);

        $this->itemFactory->create()->setData($this->getRequest()->getParams())->save();
        return $this->resultRedirectFactory->create()->setPath('storelocator/index/index');
    }
}
