<?php
	session_start();
	include_once 'includes.php';
		$Email = $_POST['Email'];
			$CEmail = $_POST['CheckEmail'];
			$Password = $_POST['Password'];
			$Status = 1;
			$OnlineStatus = 1;
			$JDate = "";
			$LastSeen = "";
			$ID = 1;
			$date = $_POST['day'].'-'.$_POST['Month'].'-'.$_POST['Year'];
			$gender = $_POST['Sex'];

			if($gender == 'male')	{
				$gender = 1;
			}	else {
				$gender = 0;
			}

			if($Email == $CEmail)	{
				$query = "INSERT INTO usertable(
					'{$_POST['PhoneNumber']}',
					'{$_POST['Email']}',
	 				'{$_POST['Name']}',
	 				'{$Status}',
	 				'{$ID}',
	 				'{$JDate}',
	 				'{$LastSeen}',
	 				'{$OnlineStatus}',
	 				'{$_POST['Password']}',	 				
	 				'{$date}',
	 				'{$gender}'
	 			)";

				$db->query($query);

			}	else {
				echo "Email Mismatch";
			}	
?>