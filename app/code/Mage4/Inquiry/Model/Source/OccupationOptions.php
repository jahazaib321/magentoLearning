<?php

namespace Mage4\Inquiry\Model\Source;

class OccupationOptions implements \Magento\Framework\Option\ArrayInterface
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
            '' => __('--Please Select--'),
            '1' => __('Unemployed'),
            '2' => __('Employed'),
            '3' => __('Businessman'),
            '4' => __('House Wife')
        ];
    }
}
