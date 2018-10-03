<!-- /**
 * @author HAZIQ HAFIZI BIN MD YUSOF
 * @email haziq_yusof@hotmail.com
 * @create date 2018-10-01 21:30:18
 * @modify date 2018-10-01 21:30:18
 * @desc contain all user functions for DBOperation
*/ -->

<?php

class DBOperation
{

    private $con;

    public function __construct()
    {

        require_once dirname(__FILE__) . '/DBConnect.php';

        $res = array();

        $db = new DBConnect();

        $this->con = $db->connect();
    }

    public function checkUser($username)
    {
        $stmt = $this->con->prepare("SELECT id FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    public function userLogin($username, $password){
        $stmt = $this->con->prepare("SELECT id FROM user WHERE username = ? AND password = ?");
        $stmt->bind_param("ss",$username,$password);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    public function getUserByUsername($username)
    {
        $stmt = $this->con->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($id, $email, $username, $password, $country_code, $phone);
        while ($stmt->fetch()) {
            $res['id'] = $id;
            $res['email'] = $email;
            $res['username'] = $username;
            $res['password'] = $password;
            $res['country_code'] = $country_code;
            $res['phone'] = $phone;

        }

        return $res;

    }




}
