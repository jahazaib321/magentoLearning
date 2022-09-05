<?php

namespace Mage4\Appointment\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\CustomerGraphQl\Model\Customer\GetCustomer;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Mage4\Appointment\Model\ResourceModel\Data\CollectionFactory;

class Appointment implements ResolverInterface
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * @var GetCustomer
     */
    private $getCustomer;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    protected $_appointmentFormCollectionFactory;

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        GetCustomer $getCustomer,
        CustomerRepositoryInterface $customerRepository,
        CollectionFactory $appointmentFormCollectionFactory
    ) {
        $this->logger = $logger;
        $this->getCustomer = $getCustomer;
        $this->customerRepository = $customerRepository;
        $this->_appointmentFormCollectionFactory = $appointmentFormCollectionFactory;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        if (empty($args)) {
            throw new GraphQlAuthorizationException(
                __(
                    'No arguments specified',
                    [\Magento\Customer\Model\Customer::ENTITY]
                )
            );
        }
        try {
            $data = $this->getAppointmentFormData($args);
            return $data;
        } catch (NoSuchEntityException $exception) {
            throw new GraphQlNoSuchEntityException(__($exception->getMessage()));
        } catch (LocalizedException $exception) {
            throw new GraphQlNoSuchEntityException(__($exception->getMessage()));
        }
    }

    /**
     *
     * @param int $context
     * @return array
     * @throws NoSuchEntityException|LocalizedException
     */
    private function getAppointmentFormData($getAppointmentFormData_array) : array
    {
        try {
            $appointment_form_data = [];
            $final_appointment_form_data = [];
            $appointment_form_items = $this->_appointmentFormCollectionFactory->create();
            $appointment_form_items->addFieldToSelect('*');
            if ( isset($appointment_form_array['name']) && !empty($appointment_form_array['name']) ) {
                $appointment_form_items->addFieldToFilter('name', ['in' => $appointment_form_array['name']]);
            }
            if ( isset($appointment_form_array['email']) && !empty($appointment_form_array['email']) ) {
                $appointment_form_items->addFieldToFilter('email', ['in' => $appointment_form_array['email']]);
            }
            if ( isset($appointment_form_array['phone']) && !empty($appointment_form_array['phone']) ) {
                $appointment_form_items->addFieldToFilter('phone', ['in' => $appointment_form_array['phone']]);
            }
            if ( isset($appointment_form_array['comment']) && !empty($appointment_form_array['comment']) ) {
                $appointment_form_items->addFieldToFilter('comment', ['in' => $appointment_form_array['comment']]);
            }
            if ( isset($appointment_form_array['date']) && !empty($appointment_form_array['date']) ) {
                $appointment_form_items->addFieldToFilter('date', ['in' => $appointment_form_array['date']]);
            }
            if ( isset($appointment_form_array['store']) && !empty($appointment_form_array['store']) ) {
                $appointment_form_items->addFieldToFilter('store', ['in' => $appointment_form_array['store']]);
            }
            $appointment_form_items->setOrder('id','desc');
            foreach ($appointment_form_items as $item) {
                array_push($appointment_form_data, $item->getData());
            }
            foreach ($appointment_form_data as $key => $udata) {
                $final_appointment_form_data[$udata['id']]['id'] = $udata['id'];
                $final_appointment_form_data[$udata['id']]['name'] = $udata['name'];
                $final_appointment_form_data[$udata['id']]['email'] = $udata['email'];
                $final_appointment_form_data[$udata['id']]['phone'] = $udata['phone'];
                $final_appointment_form_data[$udata['id']]['comment'] = $udata['comment'];
                $final_appointment_form_data[$udata['id']]['created_at'] = $udata['created_at'];
                $final_appointment_form_data[$udata['id']]['date'] = $udata['date'];
                $final_appointment_form_data[$udata['id']]['store'] = $udata['store'];
            }
            return $final_appointment_form_data;
        } catch (NoSuchEntityException $e) {
            return [];
        } catch (LocalizedException $e) {
            throw new NoSuchEntityException(__($e->getMessage()));
        }
    }
}
