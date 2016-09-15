<?php
session_start();
include_once "includes.php";
if (isset($_SESSION['loggedIn']) == 1)	{
		$query = "SELECT count(*) as count1
			FROM usertable
			WHERE PhoneNumber = '{$_POST['Numberss1']}'";

		$result = $db->query($query);
		date_default_timezone_set('Asia/Kolkata');
		$dateTime = date('Y-m-d H:i:s');
		$b = mysqli_num_rows($result); 
		$a=$result->fetch_assoc();	
		echo $a[count1];
		if($a[count1] == 1)	{
			$query2 = "SELECT groupid from groups where  AdminNumber = '{$_SESSION['PhoneNumber']}' " ;
			$result = $db->query($query2); 
			$a=$result->fetch_assoc();
			$queryq = "INSERT INTO belongto VALUES(
					'{$a[groupid]}',
					'{$_POST['Numberss1']}',
					'{$dateTime}',NULL
				)";

			$db->query($queryq);

		}
		header("location:http://localhost/PDBMS/PHP_FILES/groupid.php");
	}

?>