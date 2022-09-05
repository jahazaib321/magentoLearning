<?php

namespace Mage4\Inquiry\Model\Source;

class ActivitiesOptions implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        $options = $this->getOptions();
        $formatedOptions = [];
        foreach ($options as $key => $option) {
            array_push($formatedOptions, ['value' => $key, 'label' => $option]);
        }
        return $formatedOptions;
    }

    public function getOptions()
    {
        return [
            '1' => __('Eating'),
            '2' => __('Sleeping'),
            '3' => __('Reading'),
            '4' => __('Praying')
        ];
    }
}
