<?php
	session_start();
	include_once 'includes.php';
	if (isset($_SESSION['loggedIn']) == 1)	{
?>

<html>
 <link rel = "stylesheet" type = "text/css" href = "http://localhost/PDBMS/CSS_FILES/classes.css">
<body bgcolor = "#00FF99">
		<div  class="block" >
			<a class = "tab" style = "color: #990000;" href="http://localhost/PDBMS/PHP_FILES/Login_Success.php">Block Contact</a> </div>	
		<div  class="block" >	
			<a class = "tab" style = "color: #d7d2d2;" href="http://localhost/PDBMS/PHP_FILES/Login_Success.php"><b>Block Contact</b></a>
		</div>
<div>
	<?php
	$var=$_SESSION['PhoneNumber'];
			$query= "call BlockLIst1234($var);";
			$result = $db->query($query);
			$row[] =NULL;
			  for ($a = 1 ; $a <= $db->connection->affected_rows; $a++ ) {
		 			$row[] = $result->fetch_assoc(); }
			?>
		 	<div class = "border_online_ppl">
			<div class = "ppl" style = "left:6%;top:3%;" >
			<?php
			for ($a = 1 ; $a <= $db->connection->affected_rows; $a++ ) {	
					echo($row[$a]['Name' ]."</b><br>"); }

			?>
			</div>
			</div>	
			
</div>


		
<div style="left:1550px;">
<form method = "post" action = "http://localhost/PDBMS/PHP_FILES/block.php">
<input class = "box" style = "position:absolute;left:25%;top:39%"type = "text" placeholder = "Number" name = "Numberss" required = "Number"> 
<button class = "buttonClass"style = "position:absolute;left:44%;top:38% "name = "websubmit" type = "submit" style = "left:10px;">
            ADD blockList
</button>
</form>
</div>
</body>
<?php
}
?>