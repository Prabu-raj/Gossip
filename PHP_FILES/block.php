<?php
	session_start();
	include_once "includes.php";
	if (isset($_SESSION['loggedIn']) == 1)	{
		$query = "SELECT count(*)
			FROM usertable
			WHERE PhoneNumber = '{$_POST['Numberss']}'";

		$result = $db->query($query);
		date_default_timezone_set('Asia/Kolkata');
		$dateTime = date('Y-m-d H:i:s');

		if(mysqli_num_rows($result) == 1)	{

			$queryq = "INSERT INTO blocklist VALUES(
					'{$_SESSION['PhoneNumber']}',
					'{$_POST['Numberss']}',
					'{$dateTime}',NULL
				)";

			$db->query($queryq);

		}
		header("location:http://localhost/PDBMS/PHP_FILES/Login_Success.php");
	}

?>