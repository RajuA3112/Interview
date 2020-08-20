<?php

namespace DCKAP\Interview\Model\ResourceModel;

class Requests extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {

    public function __construct(
    \Magento\Framework\Model\ResourceModel\Db\Context $context
    ) {
        parent::__construct($context);
    }

    protected function _construct() {
        $this->_init('requested_order', 'id');
    }

}
