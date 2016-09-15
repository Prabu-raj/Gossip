<?php 
session_start();
include_once "includes.php";
if (isset($_SESSION['loggedIn']) == 1){
		$query = "delete from  FriendList where FriendNumber='{$_SESSION['PhoneNumber']}' or PhoneNumber='{$_SESSION['PhoneNumber']}'";
		$result = $db->query($query);
		$query = "delete from  chat1 where FriendNumber='{$_SESSION['PhoneNumber']}' or PhoneNumber='{$_SESSION['PhoneNumber']}'";
		$result = $db->query($query);
		$query = "delete from BlockList where PhoneNumber='{$_SESSION['PhoneNumber']}' or BlockedNumber='{$_SESSION['PhoneNumber']}'";
		$result = $db->query($query);
		$res="Select count(*) as count1,GroupId from groups where AdminNumber='{$_SESSION['PhoneNumber']}'";
		$result= $db->query($res);
		$row = $result->fetch_assoc();
		if($row['count1']!=0)	{	
			$rows[] =NULL;
			  for ($a = 1 ; $a <= $db->connection->affected_rows; $a++ ) {
		 			$rows[] = $result->fetch_assoc(); }
			for ($a = 1 ; $a <= $db->connection->affected_rows; $a++ ) {	
				//	echo($rows[$a]['Name' ]."</b><br>"); 
			$query = "delete from belongto where GroupId ='{$rows[$a]['GroupId']}'";
			$result= $db->query($query);
			
			}
			
		}
		$query = "delete from belongto where MemberNum='{$_SESSION['PhoneNumber']}'";
		$result = $db->query($query);
		$query = "delete from Groups where AdminNumber='{$_SESSION['PhoneNumber']}'";
		$result = $db->query($query);
		$delquery = "delete from usertable where PhoneNumber='{$_SESSION['PhoneNumber']}' ";
		$result1 = $db->query($delquery);
		
}
setcookie('name' , "", time() - 300);
    setcookie('pass' , "" , time() - 300);
	session_destroy();
	header("location:http://localhost/PDBMS/PHP_FILES/Login.php");

?>