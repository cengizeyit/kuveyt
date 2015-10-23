<?php
/**
 * Created by PhpStorm.
 * User: phpuzem
 * Date: 22.10.2015
 * Time: 23:34
 */

namespace Phpuzem\Kuveyt\Http\Base;


class BaseClass {


    protected $name;
    protected $cardnumber;
    protected $cardexpiredatemonth;
    protected $cardcvv2;
    protected $orderid;
    protected $amount;
    protected $customerid;
    protected $cardexpiredateyear;
    protected $cardtype = "VISA";
    protected $InstallmentCount = 0;
    protected $batchid = 0;

    public function make()
    {
        return new Kuveyt();
    }


    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    public function setCardNumber($cardnumber)
    {
        $this->cardnumber = $cardnumber;

        return $this;
    }


    public function setCardExpireDateMonth($cardexpiredatemonth)
    {
        $this->cardexpiredatemonth = $cardexpiredatemonth;

        return $this;
    }

    public function setCardExpireDateYear($cardexpiredateyear)
    {
        $this->cardexpiredateyear = $cardexpiredateyear;

        return $this;
    }

    public function setCardCvv2($cardcvv2)
    {
        $this->cardcvv2 = $cardcvv2;

        return $this;
    }

    public function setOrderId($orderid)
    {
        $this->orderid = $orderid;

        return $this;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount * 100;

        return $this;
    }

    public function setCustomerId($customerid)
    {
        $this->customerid = $customerid;

        return $this;

    }

    public function setCardtype($cardtype)
    {
        $this->cardtype = $cardtype;

        return $this;
    }

    public function setInstallmentCount($InstallmentCount)
    {
        $this->InstallmentCount = $InstallmentCount;

        return $this;
    }

    public function setBatchId($batchid)
    {
        $this->batchid = $batchid;

        return $this;
    }


}