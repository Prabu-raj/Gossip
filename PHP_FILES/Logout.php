
<?php
	session_start();
	include_once 'includes.php';
	$query = "UPDATE usertable set OnlineStatus=0 where PhoneNumber='{$_SESSION['PhoneNumber']}'";
	$db->query($query);
	setcookie('name' , "", time() - 300);
    setcookie('pass' , "" , time() - 300);
	session_destroy();
	header("location:http://localhost/PDBMS/PHP_FILES/Login.php");
?> 
