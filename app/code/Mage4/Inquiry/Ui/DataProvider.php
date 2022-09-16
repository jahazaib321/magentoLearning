<?php

namespace Mage4\Inquiry\Ui;

use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{
    protected $collection;
//    private $dataPersistor;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }

    public function getData()
    {
        $result = [];
        foreach ($this->collection->getItems() as $item) {
            $result[$item->getId()]['general'] = $item->getData();
        }
        return $result;
//        if (isset($this->loadedData)) {
//            return $this->loadedData;
//        }
//        $items = $this->collection->getItems();
//        /** @var $page \Mage4\Inquiry\Model\Item */
//        foreach ($items as $page) {
//            $this->loadedData[$page->getId()] = $page->getData();
//        }
//
//        $data = $this->dataPersistor->get('Mage4_Inquiry');
//        if (!empty($data)) {
//            $page = $this->collection->getNewEmptyItem();
//            $page->setData($data);
//            $this->loadedData[$page->getId()] = $page->getData();
//            $this->dataPersistor->clear('Mage4_Inquiry');
//        }
//
//        return $this->loadedData;
    }
}
