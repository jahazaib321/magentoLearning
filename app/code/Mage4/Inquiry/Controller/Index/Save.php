<?php

namespace Mage4\Inquiry\Controller\Index;

use Mage4\Inquiry\Model\ItemFactory;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\CustomerFactory;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\Translate\Inline\StateInterface;
use Magento\Store\Model\StoreManagerInterface;

class Save extends Action
{
    /**
     * @var ItemFactory
     */
    private $itemFactory;

    /**
     * @var Session
     */
    private $session;

    public function __construct(
        Context                     $context,
        ItemFactory                 $itemFactory,
        CustomerRepositoryInterface $customerRepositoryInterface,
        CustomerFactory             $customerFactory,
        Session                     $session,
        StoreManagerInterface       $storeManager,
        TransportBuilder            $transportBuilder,
        StateInterface              $inlineTranslation
    ) {
        $this->itemFactory = $itemFactory;
        $this->session = $session;
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
        $this->_customerFactory = $customerFactory;

        $this->storeManager = $storeManager;
        $this->transportBuilder = $transportBuilder;
        $this->inlineTranslation = $inlineTranslation;

        parent::__construct($context);
    }

    public function execute()
    {
        $generalFieldSet = $this->getRequest()->getPost();
        $generalFieldSet = (array)$generalFieldSet;
        $arr = $generalFieldSet['activities'];
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] == 1) {
                $arr[$i] = 'Swimming';
            } elseif ($arr[$i] == 2) {
                $arr[$i] = 'Reading';
            } elseif ($arr[$i] == 3) {
                $arr[$i] = 'Sports';
            } elseif ($arr[$i] == 4) {
                $arr[$i] = 'Walking';
            } elseif ($arr[$i] == 5) {
                $arr[$i] = 'sleeping';
            }
        }

        $array2 = $generalFieldSet['occupation'];
        for ($j = 0; $j < $array2; $j++) {
            if ($array2 == 1) {
                $array2 = 'Unemployed';
            } elseif ($array2 == 2) {
                $array2 = 'Employed';
            } elseif ($array2 == 3) {
                $array2 = 'Businessman';
            } elseif ($array2 == 4) {
                $array2 = 'House Wife';
            }

            $arr = implode(',', $arr);
            $data = $this->getRequest()->getPostValue();
            $arrActivities = $data['activities'];
            $arrActivities = implode(',', $arrActivities);
            $data['activities'] = $arrActivities;

            $this->itemFactory->create()
                ->setData($data)
                ->save();

            $templateOptions = ['area' => \Magento\Framework\App\Area::AREA_FRONTEND, 'store' => $this->storeManager->getStore()->getId()];
            $templateVars = [
                'name' => $this->session->getCustomer()->getName(),
                'email' => $generalFieldSet['email'],
//                'dob' => $generalFieldSet['dob'],
                'activities' => $arr,
                'occupation' => $array2,
              'dob'    => date("d/m/Y", strtotime( $generalFieldSet['dob']))
            ];
            $from = ['email' => "test@webkul.com", 'name' => 'Name of Sender'];
            $this->inlineTranslation->suspend();
            $to = $this->session->getCustomer()->getEmail();
            $transport = $this->transportBuilder->setTemplateIdentifier('inquiry_email_template')
                ->setTemplateOptions($templateOptions)
                ->setTemplateVars($templateVars)
                ->setFrom($from)
                ->addTo($to)
                ->getTransport();
            $transport->sendMessage();
            $this->inlineTranslation->resume();

            $customerId = $this->session->getCustomer()->getId();
            $customer = $this->_customerFactory->create()->load($customerId)->getDataModel();
            $customer->setCustomAttribute('customer_attribute', "1");
            $this->_customerRepositoryInterface->save($customer);

            return $this->resultRedirectFactory->create()->setPath('checkout/index/index');
        }
    }
}
