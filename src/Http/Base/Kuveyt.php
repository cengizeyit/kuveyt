<?php
/**
 * Created by PhpStorm.
 * User: phpuzem
 * Date: 22.10.2015
 * Time: 21:16
 */

namespace Phpuzem\Kuveyt\Http\Base;


class Kuveyt {

    protected $name;
    protected $cardnumber;
    protected $cardexpiredatemonth;
    protected $cardcvv2;
    protected $orderid;
    protected $amount;
    protected $customerid;
    protected $cardexpiredateyear;

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
        $this->amount = $amount;

        return $this;
    }

    public function setCustomerId($customerid)
    {
        $this->customerid = $customerid;

        return $this;

    }


}