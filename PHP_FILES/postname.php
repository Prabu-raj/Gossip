<?php
session_start();
include_once 'includes.php';
if(isset($_POST['RESName']) ) {
	$_SESSION['chat_friend'] = $_POST['RESName']; 
}
?>
