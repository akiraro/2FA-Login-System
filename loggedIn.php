<?php
    session_start();

    if (isset($_REQUEST['logout'])) {
        $_SESSION = array();

        $url = "/login.php";
        header('Location: ' . $url, true);
        die();
    }
?>

<html>

<head>
   <title>User Control Panel</title>

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
         <center><div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>User Control Panel</b></div> </center>

         <div style = "margin:30px">

            <form action = "" method = "post">
                <center><h1>Logged In </h1> 
                
               <input type = "submit" name = "logout" value = " Logout "/><br />
                
                </center>

            </form>



         </div>

      </div>

   </div>

</body>
</html>
