<?php

namespace Mage4\Inquiry\Block;

use Mage4\Inquiry\Model\Item;
use Mage4\Inquiry\Model\ResourceModel\Item\CollectionFactory;
use Mage4\Inquiry\Model\Source\ActivitiesOptions;
use Mage4\Inquiry\Model\Source\OccupationOptions;
use Magento\Framework\View\Element\Template;

class InquiryForm extends Template
{
    private $activitiesOptions;
    private $occupationOptions;
    private $collectionFactory;

    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        OccupationOptions $occupationOptions,
        ActivitiesOptions $activitiesOptions,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->occupationOptions = $occupationOptions;
        $this->activitiesOptions = $activitiesOptions;
        parent::__construct($context, $data);
    }

    /**
     * @return Item[]
     */

    public function getOccupationOptions(): array
    {
        return $this->occupationOptions->getOptions();
    }
    public function getActivitiesOptions(): array
    {
        return $this->activitiesOptions->getOptions();
    }
    public function getItems(): string
    {
        return $this->getUrl('inquiry/index/save', ['_secure' => true]);
    }
}
