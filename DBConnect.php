<!-- /**
 * @author HAZIQ HAFIZI BIN MD YUSOF
 * @email haziq_yusof@hotmail.com
 * @create date 2018-10-01 21:29:28
 * @modify date 2018-10-01 21:29:28
 * @desc Setup connection with external MYSQL database
*/ -->


<?php

	class DBConnect{

		private $con;
		function __coonstruct(){


		}

		function connect(){
			$this->con = mysqli_connect('db4free.net','akirarolab2','12345678','akirarolab2') or die('Unable to connect to database');

			if(mysqli_connect_errno()){
				echo "Failed to connect with database".mysqli_connect_error();
			}
			

			return $this->con;
		}
	}

	?>