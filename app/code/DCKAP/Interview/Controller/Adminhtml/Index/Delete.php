<?php

namespace DCKAP\Interview\Controller\Adminhtml\Index;

class Delete extends \Magento\Backend\App\Action {

    public function execute() {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create('DCKAP\Interview\Model\Requests');
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccessMessage(__('You deleted the Request.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a Request to delete.'));
        return $resultRedirect->setPath('*/*/');
    }

}
