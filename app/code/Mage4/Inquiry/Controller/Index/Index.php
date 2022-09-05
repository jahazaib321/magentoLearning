<?php

namespace Mage4\Inquiry\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
//        /** @var \Magento\Framework\Controller\Result\Raw $result */
//        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
//        $result->setContents('InquiryForm World!');
//        return $result;
    }
}
