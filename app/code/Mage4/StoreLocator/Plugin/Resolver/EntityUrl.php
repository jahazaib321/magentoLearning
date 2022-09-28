<?php

namespace MageGuide\StoreLocator\Plugin\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;


class EntityUrl
{
    public function aroundResolve(
        $subject,
        callable $proceed,
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    )
    {
        $result = $proceed($field, $context, $info, $value, $args);

        $pwaUrl = 'mage4Stores';

        if(!$result || !isset($result['type']) || $result['type'] === 'NOT_FOUND'){
            $result = $this->resolveStoreUrls($url,$pwaUrl);
        }
        return $result;
    }

    public function resolveStoreUrls($url,$pwaUrl){
        $result = null;

        if($pwaUrl === $url){
            $result = [
                'id' => null,
                'type' => 'STORE_LIST',
                'canonical_url' => 'mage4Stores/',
                'title' => ucwords(str_replace('_',' ',$pwaUrl)),
                'meta_description' => "Stores",
                'meta_title' => "Stores",
                'meta_keywords' => "Stores"
            ];
        }

        return $result;
    }
}
