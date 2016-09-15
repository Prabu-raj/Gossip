<?php 
session_start();
include_once 'includes.php';
if(isset($_SESSION['loggedIn'])==1) {
?>

<link rel = "stylesheet" type = "text/css" href = "http://localhost/PDBMS/CSS_FILES/classes.css">
<body bgcolor = "#00FF99">
<div  class="Groups" >
			<a class = "tab" style = "color: #990000;" href="http://localhost/PDBMS/PHP_FILES/Login_Success.php">Groups</a> </div>	
<div  class="Groups" >	
			<a class = "tab" style = "color: #d7d2d2;" href="http://localhost/PDBMS/PHP_FILES/Login_Success.php"><b>Groups</b></a></div>
<div style = "left:1550px;">
<form method = "post" action = "http://localhost/PDBMS/PHP_FILES/groupid.php">
<input class = "box" style = "position:absolute;left:25%;top:40% " type = "text" placeholder = "Group Name" name = "text1" required = "Text"> 
<button class = "buttonClass" name = "websubmit" type = "submit" style = "position:absolute;left:44%;top:39% ">
            Create Group
</button>
</form>
</div>
</body>
<?php
}
?>
