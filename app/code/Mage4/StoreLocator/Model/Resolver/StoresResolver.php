<?php

namespace Mage4\StoreLocator\Model\Resolver;

use Mage4\StoreLocator\Model\ResourceModel\Store\CollectionFactory;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class StoresResolver implements ResolverInterface
{
    private $collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }

    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        $collection = $this->collectionFactory->create();
        return [
            'total_count' => $collection->count(),
            'items' => $collection->getData(),
            'id' => $collection->getData(),
            'name' => $collection->getData(),
            'country' => $collection->getData(),
            'state' => $collection->getData(),
            'city' => $collection->getData(),
            'zip' => $collection->getData(),
            'street' => $collection->getData(),
            'lat' => $collection->getData(),
            'lng' => $collection->getData(),
            'phone' => $collection->getData(),
            'email' => $collection->getData(),
            'image' => $collection->getData(),
        ];
    }
}
