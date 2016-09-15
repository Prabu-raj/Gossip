<?php
session_start();
include_once 'includes.php';
if(isset($_SESSION['loggedIn'])==1) {

date_default_timezone_set('Asia/Kolkata');
$dateTime = date('Y-m-d H:i:s');
if(isset($_POST['text1'])) {
$query = "INSERT INTo groups (AdminNumber,Subject) values (
			'{$_SESSION['PhoneNumber']}',
             '{$_POST['text1']}'
			)";
$db->query($query);
}

?>
<link rel = "stylesheet" type = "text/css" href = "http://localhost/PDBMS/CSS_FILES/classes.css">
<body bgcolor = "#00FF99">
<div style = "left:1550px;">
<form method = "post" action = "http://localhost/PDBMS/PHP_FILES/group.php">
<input class = "box" type = "text" placeholder = "Number" name = "Numberss1" required = "Number"> 
<button class = "buttonClass" name = "websubmit" type = "submit" style = "left:10px">
            ADD MEMBERS
</button>
</form>
</div>
</body>
<?php
}
?>
