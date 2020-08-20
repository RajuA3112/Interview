<?php

namespace DCKAP\Interview\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class RequestOrder extends \Magento\Framework\App\Action\Action {

    protected $_pageFactory;
    protected $_requests;
    protected $_messageManager;

    public function __construct(
    \Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $pageFactory, \DCKAP\Interview\Model\RequestsFactory $requests, \Magento\Framework\Message\ManagerInterface $messageManager
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_requests = $requests;
        $this->_messageManager = $messageManager;

        return parent::__construct($context);
    }

    public function execute() {
        try {
            $productArray = $this->getRequest()->getParam('product');
            $productDetails = array_filter($productArray);
            $product = implode(',', $productDetails);
            if ($this->getRequest()->getParams()) {
                $request = $this->_requests->create();
                $request->setName($this->getRequest()->getParam('name'));
                $request->setEmail($this->getRequest()->getParam('email'));
                $request->setAddress($this->getRequest()->getParam('address'));
                $request->setCity($this->getRequest()->getParam('city'));
                $request->setState($this->getRequest()->getParam('state'));
                $request->setPostcode($this->getRequest()->getParam('postcode'));
                $request->setCountry($this->getRequest()->getParam('country'));
                $request->setProduct($product ?: "");
                $request->setStatus(0);
                $request->setCreatedAt((new \DateTime())->format(\Magento\Framework\Stdlib\DateTime::DATETIME_PHP_FORMAT));
                $request->save();
            }
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $this->_messageManager->addSuccess(__("Your Request has been submitted successfully"));
        } catch (\Exception $e) {
            $this->_messageManager->addErrorMessage(__($e->getMessage()));
        }
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;
    }

}
