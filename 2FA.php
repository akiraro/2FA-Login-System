<!-- /**
 * @author HAZIQ HAFIZI BIN MD YUSOF
 * @email haziq_yusof@hotmail.com
 * @create date 2018-10-01 21:28:27
 * @modify date 2018-10-01 21:28:27
 * @desc 2 Factor Authentication using PHP + Authy/Twilio
*/ -->

<?php
session_start();
$var_value = $_SESSION['user'];
require_once 'sendSMS.php';
require_once 'verifyToken.php';
require_once 'DBOperation.php';

$sms = new sendSMS();
$verify = new verifyToken();

if (isset($_REQUEST['submit'])) {

    $db = new DBOperation();
    $ready = $db->userLogin($var_value['username'], $_POST['password']);

    if ($ready == true) {
        $ready2 = $verify->verifyToken($var_value, $_POST['token']);
    }else{
        $ready2 = false;
        echo "Wrong Password + Token";
    }

    if ($ready2 == true) {
        $_SESSION['logged'] = true;
        $url = "/loggedIn.php";
        header('Location: ' . $url, true);
        die();
    }

} else if (isset($_REQUEST['token'])) {
    $sms->sendSMS($var_value);
    echo "<script type='text/javascript'>alert('SMS Sent');</script>";
}

?>

<html>

   <head>
      <title>2 Factor Authentication</title>

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
            <center><div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Verify Token</b></div></center>

            <div style = "margin:30px" align = "justify">

               <form action = "" method = "post">
                  <label>Token  :</label><input id = "token" type = "text" name = "token" class = "box"/><br /><br />
                  <label>Password  :</label><input id = "password" type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" name = "token" value="Request Token"/><br />
                  <input type = "submit" name = "submit" value = " Submit "/><br />
               </form>



            </div>

         </div>

      </div>

   </body>
</html>
