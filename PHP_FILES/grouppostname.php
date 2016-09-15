<?php
session_start();
include_once 'includes.php';
if(isset($_POST['RESName']) ) {
	$query = "SELECT groups.GroupId as grp from groups,belongto 
			WHERE groups.Subject = '{$_POST['RESName']}'
			AND (groups.AdminNumber = '{$_SESSION['PhoneNumber']}'
				or
				belongto.MemberNum = '{$_SESSION['PhoneNumber']}')";
				
		$result = $db->query($query);
		$a = $result->fetch_assoc();
		$_SESSION['Groupchatid'] = $a['grp'] ;

}

?>
