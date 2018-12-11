<?php
namespace Crucial\Service\Chargify;

class PaymentProfile extends AbstractEntity{

    /**
     * Sets the masked card number
     * @param $maskedCardNumber
     * @return $this
     */
    public function setMaskedCardNumber($maskedCardNumber){
        $this->setParam('masked_card_number', $maskedCardNumber);
        return $this;
    }

    /**
     * Sets the last four digits
     * @param $lastFour
     * @return $this
     */
    public function setLastFour($lastFour){
        $this->setParam('last_four', $lastFour);
        return $this;
    }


    /**
     * Sets the vault token
     * @param  $vaultToken
     * @return $this
     */
    public function setVaultToken($vaultToken){
        $this->setParam('vault_token', $vaultToken);
        return $this;
    }


    /**
     * @param  $billingAddress
     * @return $this
     */
    public function setBillingAddress($billingAddress){
        $this->setParam('billing_address', $billingAddress);
        return $this;
    }



    /**
     * @param $billingCity
     * @return $this
     */
    public function setBillingCity($billingCity){
        $this->setParam('billing_city', $billingCity);
        return $this;
    }

    /**
     * @param $billingCountry
     * @return $this
     */
    public function setBillingCountry($billingCountry){
        $this->setParam('billing_country', $billingCountry);
        return $this;
    }


    /**
     * @param $billingZip
     * @return $this
     */
    public function setBillingZip($billingZip){
        $this->setParam('billing_zip', $billingZip);
        return $this;
    }


    /**
     * @param $billingState
     * @return $this
     */
    public function setBillingState($billingState){
        $this->setParam('billing_state', $billingState);
        return $this;
    }





    /**
     * Sets the vault token
     * @param  $currentVault
     * @return $this
     */
    public function setCurrentVault($currentVault){
        $this->setParam('current_vault', $currentVault);
        return $this;
    }


    /**
     * Sets the id
     * @param $id
     * @return $this
     */
    public function setId($id){
        $this->setParam('id', $id);
        return $this;
    }

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

        if($this->isError() || !isset($responseArray[0]))
            throw new \Exception("Unknown exception while getting payment profiles by payee");

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