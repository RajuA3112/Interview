<?php

namespace DCKAP\Interview\Model;

class Requests extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface {

    const CACHE_TAG = 'requested_order';

    protected $_cacheTag = 'requested_order';
    protected $_eventPrefix = 'requested_order';

    protected function _construct() {
        $this->_init('DCKAP\Interview\Model\ResourceModel\Requests');
    }

    public function getIdentities() {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues() {
        $values = [];

        return $values;
    }

}
