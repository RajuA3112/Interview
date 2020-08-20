<?php

namespace DCKAP\Interview\Model\ResourceModel\Requests;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {

    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'requested_order';
    protected $_eventObject = 'requests_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct() {
        $this->_init('DCKAP\Interview\Model\Requests', 'DCKAP\Interview\Model\ResourceModel\Requests');
    }

}
