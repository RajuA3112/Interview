<?php

namespace DCKAP\Interview\Model\Source;

class Status implements \Magento\Framework\Data\OptionSourceInterface {

    protected $_requests;

    public function __construct(\DCKAP\Interview\Model\RequestsFactory $requests) {
        $this->_requests = $requests;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray() {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->getOptionArray();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }

    public static function getOptionArray() {
        return [0 => __('New'), 1 => __('In progress'), 2 => __('Completed')];
    }

}
