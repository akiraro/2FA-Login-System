<!-- /**
 * @author HAZIQ HAFIZI BIN MD YUSOF
 * @email haziq_yusof@hotmail.com
 * @create date 2018-10-01 21:30:08
 * @modify date 2018-10-01 21:30:08
 * @desc login PHP
*/ -->

<?php

require_once 'DBOperation.php';

session_start();
$response = array();

error_reporting(0);
if ($_SESSION['logged'] == true) {
    $url = "/loggedIn.php";
    header('Location: ' . $url, true);
    die();
}
$_SESSION = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username'])) {

        $db = new DBOperation();

        if ($db->checkUser($_POST['username'])) {

            $user = $db->getUserByUserName($_POST['username']);

            $response['username'] = $user['username'];
            $response['country_code'] = $user['country_code'];
            $response['phone'] = $user['phone'];
            $response['verified'] = false;

            $_SESSION['user'] = $response;
            $url = "/2FA.php";
            header('Location: ' . $url, true);
            die();

        } else {
            $response['error'] = true;
            echo $response['message'] = "Invalid username";

        }

    }

}

?>


<html>

   <head>
      <title>Login Page</title>

      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>

   </head>

   <body bgcolor = "#FFFFFF">

      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post">
                  <label>UserName  :</label><input id = "username" type = "text" name = "username" class = "box"/><br /><br />
                  <!-- <label>Password  :</label><input id = "password" type = "password" name = "password" class = "box" /><br/><br /> -->
                  <input type = "submit" value = " Submit "/><br />
               </form>



            </div>

         </div>

      </div>

   </body>
</html>