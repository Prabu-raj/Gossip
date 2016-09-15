<?php
	session_start();
	include_once "includes.php";
	if (isset($_SESSION['loggedIn']) == 1)	{
		$query = "SELECT count(*) as count1
			FROM usertable
			WHERE PhoneNumber = '{$_POST['Numbers']}'
			and
			'{$_SESSION['PhoneNumber']}'<>'{$_POST['Numbers']}'
			";
		$result = $db->query($query);
		date_default_timezone_set('Asia/Kolkata');
		$dateTime = date('Y-m-d H:i:s');
//  		$a = mysqli_num_rows($result) ;
		$b = $result->fetch_assoc();
		         
			



		if($b[count1] == '1')	{

			$query = "INSERT INTO  FriendList	VALUES(
					'{$_SESSION['PhoneNumber']}',
					'{$_POST['Numbers']}',
					0
				)";

			$db->query($query);

		}
		header("location:http://localhost/PDBMS/PHP_FILES/Login_Success.php");
	}

?>