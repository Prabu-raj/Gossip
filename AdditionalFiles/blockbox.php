<?php
	session_start();
	include_once 'includes.php';
	if (isset($_SESSION['loggedIn']) == 1)	{
?>

<html>
 <link rel = "stylesheet" type = "text/css" href = "http://localhost/PDBMS/CSS_FILES/classes.css">
<body bgcolor = "#00FF99">
<div>
	<?php
	$var=$_SESSION['PhoneNumber'];
			$query= "call BlockLIst1234($var);";
			$result = $db->query($query);
			$row[] =NULL;
			  for ($a = 1 ; $a <= $db->connection->affected_rows; $a++ ) {
		 			$row[] = $result->fetch_assoc(); }
			for ($a = 1 ; $a <= $db->connection->affected_rows; $a++ ) {	
					echo($row[$a]['Name' ]."</b><br>"); }

			
			?>
</div>
<div style="left:1550px;">
<form method = "post" action = "http://localhost/PDBMS/PHP_FILES/block.php">
<input class = "box" type = "text" placeholder = "Number" name = "Numberss3" required = "Number"> 
<button class = "buttonClass" name = "websubmit" type = "submit" style = "left:10px;">
            ADD blockList
</button>
</form>
</div>
</body>
<?php
}
?>