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

}