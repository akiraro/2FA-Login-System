<!-- /**
 * @author HAZIQ HAFIZI BIN MD YUSOF
 * @email haziq_yusof@hotmail.com
 * @create date 2018-10-01 21:29:51
 * @modify date 2018-10-01 21:29:51
 * @desc sendSMS PHP file
*/ -->

<?php

class sendSMS
{

    private $con;

    public function __construct()
    {

    }

    public function sendSMS($data)
    {
        require_once 'vendor/authy/php/Authy.php';

        $prod = false;
        $apiKey = 'oCrQ6PBbZky6audu1Ar8ia117U5nMAs9';
        $apiUrl = 'https://api.authy.com';

        $api = new Authy_Api($apiKey, $apiUrl);

        $userEmail = 'haziqtbd@gmail.com';
        $userPhone = $data['phone'];
        $userCountryCode = $data['country_code'];
        // $user = $api->registerUser($userEmail, $userPhone, $userCountryCode, false);

        $test = $api->phoneVerificationStart($userPhone, $userCountryCode, 'sms', '8', null);
        //$test = $api->requestSMS($user->id(),array("force" => "true"));



    }

}
