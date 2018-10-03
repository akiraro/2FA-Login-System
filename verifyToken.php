<!-- /**
 * @author HAZIQ HAFIZI BIN MD YUSOF
 * @email haziq_yusof@hotmail.com
 * @create date 2018-10-01 21:29:12
 * @modify date 2018-10-01 21:29:12
 * @desc verifyToken using Authy API
*/ -->


<?php

class verifyToken
{

    private $con;

    public function __construct()
    {

    }

    public function verifyToken($data,$token)
    {
        require_once 'vendor/authy/php/Authy.php';

        $apiKey = 'oCrQ6PBbZky6audu1Ar8ia117U5nMAs9';
        $apiUrl = 'https://api.authy.com';
        $api = new Authy_Api($apiKey, $apiUrl);

        $userPhone = $data['phone'];
        $userCountryCode = $data['country_code'];

        $test = $api->phoneVerificationCheck($userPhone, $userCountryCode, $token);

        echo $test->message();
        return $test->ok();
    }
}
