<?php
/**
 * Created by PhpStorm.
 * User: phpuzem
 * Date: 22.10.2015
 * Time: 23:34
 */

namespace Phpuzem\Kuveyt\Http\Base;

use Config;

class BaseClass extends Kuveyt {

    protected function process()
    {
        $HashedPassword = base64_encode(sha1(Config::get("kuveyt.Password"), "ISO-8859-9")); //md5($Password);
        $HashData = base64_encode(sha1(Config::get("kuveyt.MerchantId") . $this->orderid . $this->amount . Config::get("kuveyt.OkUrl") . Config::get("kuveyt.FailUrl") . Config::get("kuveyt.UserName") . $HashedPassword, "ISO-8859-9"));

        try
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POST, true); //POST Metodu kullanarak verileri gönder
            curl_setopt($ch, CURLOPT_HEADER, false); //Serverdan gelen Header bilgilerini önemseme.
            curl_setopt($ch, CURLOPT_URL, 'https://boa.kuveytturk.com.tr/sanalposservice/'); //Baglanacagi URL
            curl_setopt($ch, CURLOPT_POSTFIELDS, '<KuveytTurkVPosMessage xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">'
                . '<APIVersion>1.0.0</APIVersion>'
                . '<OkUrl>' . Config::get("kuveyt.OkUrl") . '</OkUrl>'
                . '<FailUrl>' . Config::get("kuveyt.FailUrl") . '</FailUrl>'
                . '<HashData>' . $HashData . '</HashData>'
                . '<MerchantId>' . Config::get("kuveyt.MerchantId") . '</MerchantId>'
                . '<CustomerId>' . $this->customerid . '</CustomerId>'
                . '<UserName>' . Config::get("kuveyt.UserName") . '</UserName>'
                . '<CardNumber>' . $this->cardnumber . '</CardNumber>'
                . '<CardExpireDateYear>' . $this->cardexpiredateyear . '</CardExpireDateYear>'
                . '<CardExpireDateMonth>' . $this->cardexpiredatemonth . '</CardExpireDateMonth>'
                . '<CardCVV2>' . $this->cardcvv2 . '</CardCVV2>'
                . '<CardHolderName>' . $this->name . '</CardHolderName>'
                . '<CardType>' . $karttipi . '</CardType>'
                . '<CustomerEmailAddress>' . $email . '</CustomerEmailAddress>'
                . '<BatchID>0</BatchID>'
                . '<TransactionType>' . $Type . '</TransactionType>'
                . '<InstallmentCount>0</InstallmentCount>'
                . '<Amount>' . $Amount . '</Amount>'
                . '<DisplayAmount>72,56</DisplayAmount>'
                . '<CurrencyCode>' . $CurrencyCode . '</CurrencyCode>'
                . '<MerchantOrderId>' . $MerchantOrderId . '</MerchantOrderId>'
                . '<TransactionSecurity>' . Config::get("kuveyt.TransactionSecurity")  . '</TransactionSecurity>'
                . '</KuveytTurkVPosMessage>');


            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Transfer sonuçlarini al.
            $data = curl_exec($ch);
            curl_close($ch);
        } catch (Exception $e)
        {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
        echo($data);
        error_reporting(E_ALL);
        ini_set("display_errors", 1);


    }


}