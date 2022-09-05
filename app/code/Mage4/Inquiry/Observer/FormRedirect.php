<?php
namespace Mage4\Inquiry\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ActionFlag;
use Magento\Framework\UrlInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class FormRedirect implements ObserverInterface
{
    protected $_responseFactory;
    /**
     * @var UrlInterface
     */
    private $url;

    /**
     * @var ActionFlag
     */
    private $actionFlag;
    /**
     * @var  Session
     */
    private $session;

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(
        \Magento\Framework\App\ResponseFactory $responseFactory,
        \Magento\Framework\UrlInterface $url,
        \Magento\Framework\App\ActionFlag $actionFlag,
        ManagerInterface $messageManager,
        ScopeConfigInterface $scopeConfig,
        Session $session
    ) {
        $this->messageManager = $messageManager;
        $this->_responseFactory = $responseFactory;
        $this->actionFlag = $actionFlag;
        $this->scopeConfig = $scopeConfig;
        $this->url = $url;
        $this->session = $session;
    }
    public function execute(Observer $observer)
    {
        $config_check = $this->scopeConfig->isSetFlag('inquiry/general/enabled');
        if ($this->session->isLoggedIn()) {
            $customerData = $this->session->getCustomer();
            $customerInquiryFormValidator = $customerData->getCustomerAttribute();
            if ($config_check && $customerInquiryFormValidator == 0) {
                //   Stop further processing if your condition is met
                $this->actionFlag->set('', Action::FLAG_NO_DISPATCH, true);
                // then in last redirect
                $observer->getControllerAction()->getResponse()->setRedirect($this->url->getUrl("inquiry/index/index"));
            }
        }
    }
}
