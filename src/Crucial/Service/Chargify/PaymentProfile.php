<?php
namespace Crucial\Service\Chargify;

class PaymentProfile extends AbstractEntity{

    /**
     * @param $cvv
     * @return $this
     */
    public function setCVV($cvv){
        $this->setParam('cvv', $cvv);
        return $this;
    }

    /**
     * @param $expirationYear
     * @return $this
     */
    public function setExpirationYear($expirationYear){
        $this->setParam('expiration_year', $expirationYear);
        return $this;
    }


    /**
     * @param $expirationMonth
     * @return $this
     */
    public function setExpirationMonth($expirationMonth){
        $this->setParam('expiration_month', $expirationMonth);
        return $this;
    }


    /**
     * @param $fullNumber
     * @return $this
     */
    public function setFullNumber($fullNumber){
        $this->setParam('full_number', $fullNumber);
        return $this;
    }


    /**
     * @param $customerId
     * @return $this
     */
    public function setCustomerId($customerId){
        $this->setParam('customer_id', $customerId);
        return $this;
    }



    /**
     * (Required)
     *
     * @param string $firstName
     *
     * @return PaymentProfile
     */
    public function setFirstName($firstName)
    {
        $this->setParam('first_name', $firstName);
        return $this;
    }

    /**
     * (Required)
     *
     * @param string $lastName
     *
     * @return PaymentProfile
     */
    public function setLastName($lastName)
    {
        $this->setParam('last_name', $lastName);
        return $this;
    }


    /**
     * Create a new PaymentProfile
     *
     * @return PaymentProfile
     */
    public function create()
    {
        $service = $this->getService();
        $rawData = $this->getRawData(
            array(
                'payment_profile' => $this->getParams()
            )
        );
        $response      = $service->request('payment_profiles', 'POST', $rawData);
        $responseArray = $this->getResponseArray($response);

        if (!$this->isError()) {
            $this->_data = $responseArray['payment_profile'];
        } else {
            $this->_data = array();
        }

        return $this;
    }


    /**
     * List all the payment profiles by customer id
     * @param $customerId
     * @return array
     * @throws \Exception
     */
    public function listPaymentProfilesByCustomerId($customerId)
    {
        $service = $this->getService();

        $this->setParam('customer_id', $customerId);

        $response      = $service->request('payment_profiles', 'GET', NULL, $this->getParams());
        $responseArray = $this->getResponseArray($response);

        if($this->isError()){
            throw new \Exception("Unknown exception while getting payment profiles by payee");
        }

        return $responseArray[0];
    }

    /**
     * Parse data
     * @param $data
     * @return PaymentProfile
     */
    public function parse($data){
        $this->_data = $data;
        return $this;
    }

}