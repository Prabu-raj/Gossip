<?php 
session_start();
include_once "includes.php";
if (isset($_SESSION['loggedIn']) == 1){
		$query = "delete from  FriendList where FriendNumber='{$_SESSION['PhoneNumber']}' or PhoneNumber='{$_SESSION['PhoneNumber']}'";
		$result = $db->query($query);
		$query = "delete from  chat where FriendNumber='{$_SESSION['PhoneNumber']}' or PhoneNumber='{$_SESSION['PhoneNumber']}'";
		$result = $db->query($query);
		$delquery = "delete from usertable where PhoneNumber='{$_SESSION['PhoneNumber']}' ";
		$result1 = $db->query($delquery);
}
setcookie('name' , "", time() - 300);
    setcookie('pass' , "" , time() - 300);
	session_destroy();
	header("location:http://localhost/PDBMS/PHP_FILES/Login.php");

?>