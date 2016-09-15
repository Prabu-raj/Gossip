<?php
	session_start();
	include_once 'includes.php';
	if(isset($_POST['Name']) && isset($_POST['PhoneNumber'])  && isset($_POST['Email']) && isset($_POST['CheckEmail']) && isset($_POST['Password']) && isset ($_POST['Sex']) && isset($_POST['Day']) && isset($_POST['Month']) && isset($_POST['Year']) )	{
		if(!empty($_POST['Name']) && !empty($_POST['PhoneNumber']) && !empty($_POST['Email']) && !empty($_POST['CheckEmail']) && !empty($_POST['Password']) && !empty($_POST['Sex']) && !empty($_POST['Day']) && !empty($_POST['Month']) && !empty($_POST['Year']))	{			
			$Email = $_POST['Email'];
			$CEmail = $_POST['CheckEmail'];
			$Password = $_POST['Password'];
			$Status = "Available";
			$OnlineStatus = 1;
			$current_date = date("Y-m-d");
			$LastSeen = date("Y-m-d");
			$ID = 1;
			$date = $_POST['Day'].$_POST['Month'].$_POST['Year'];
			$date = date('y/m/d', strtotime($date));
			$gender = $_POST['Sex'];

			if($gender == 'male')	{
				$gender = 1;
			}	else {
				$gender = 0;
			}

			if($Email == $CEmail)	{
				$query = "INSERT INTO usertable values (
					'{$_POST['PhoneNumber']}',
					'{$_POST['Email']}',
	 				'{$_POST['Name']}',
	 				'{$Status}',
	 				'{$ID}',
	 				'{$current_date}',
	 				'{$LastSeen}',
	 				'{$OnlineStatus}',
	 				'{$_POST['Password']}',	 				
	 				'{$date}',
	 				'{$gender}'
	 			)";

				$db->query($query);

				setcookie('name' , $_POST['name'] , time() + 300);
            	setcookie('pass' , $pass , time() + 300);
            	$_SESSION['loggedIn'] = 1;
            	$_SESSION['PhoneNumber'] = $_POST['PhoneNumber'];

				header("location:http://localhost/PDBMS/PHP_FILES/FirstTime.php");
			}	else {
				echo '<script>alert("Email Mismatch")</script>';
			}
		}	else {
			echo '<script>alert("Fill In All Details")</script>';
		}
	}else {
		echo '<script>alert("Enter the Details and press submit button")</script>';
		header("location:http://localhost/PDBMS/PHP_FILES/Login.php");
	}
?>