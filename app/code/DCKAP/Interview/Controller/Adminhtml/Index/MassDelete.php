<?php

namespace DCKAP\Interview\Controller\Adminhtml\Index;

class MassDelete extends \Magento\Backend\App\Action {

    private $filter;
    private $collectionFactory;

    public function __construct(
    \Magento\Ui\Component\MassAction\Filter $filter, \DCKAP\Interview\Model\ResourceModel\Requests\CollectionFactory $collectionFactory, \Magento\Backend\App\Action\Context $context
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function execute() {
        try {
            $logCollection = $this->filter->getCollection($this->collectionFactory->create());
            $itemsDeleted = 0;
            foreach ($logCollection as $item) {
                $item->delete();
                $itemsDeleted++;
            }
            $this->messageManager->addSuccess(__('A total of %1 Request(s) were deleted.', $itemsDeleted));
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/');
    }

}
