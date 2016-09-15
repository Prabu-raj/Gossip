	<?php
	session_start();
	include_once 'includes.php';


	 if (isset($_SESSION['loggedIn']) == 1){
				$query = "SELECT distinct Name
			FROM userTable , FriendList
			WHERE FriendList.FriendNumber = userTable.PhoneNumber
				AND FriendList.PhoneNumber = '{$_SESSION['PhoneNumber']}'
				order by onlinestatus desc  ";
				
		$result = $db->query($query);
		$rows[]=NULL;
		   for ($a = 1 ; $a <= $db->connection->affected_rows; $a++ ) {

		   		$rows[] = $result->fetch_assoc();

		   }

		  } 


		 ?>
		 	
		 <div class = "border_online_ppl">
			<div class = "ppl" style = "left:6%;top:3%;" >
		 	     <?php for ($a = 1 ; $a <= $db->connection->affected_rows; $a++ ) {
		 			?> <a class="chatperson" id ="1"  href="#"> <?php  echo("<b>".$rows[$a]['Name' ]."</b></br>"); ?></a>
		 			
		 			<?php }?> 
		 	</div>
		 </div>

<?php
	
	if (isset($_SESSION['loggedIn']) == 1)	{
?>

<html>
		<div id =chat class="Contacts" >
					<a class = "tab" style = "color: #990000;" href="http://localhost/PDBMS/PHP_FILES/Login_Success.php">People</a> </div>	
		<div id =chat class="Contacts" >	
					<a class = "tab" style = "color: #d7d2d2;" href="http://localhost/PDBMS/PHP_FILES/Login_Success.php"><b>People</b></a>
				</div>
 <link rel = "stylesheet" type = "text/css" href = "http://localhost/PDBMS/CSS_FILES/classes.css">
<body bgcolor = "#00FF99">
<form method = "post" action = "http://localhost/PDBMS/PHP_FILES/ADD_Contact.php">
<input class = "box" type = "text" placeholder = "Number" name = "Numbers" required = "Number" style ="position:absolute ; left:35%;top:45%;"> 
<button class = "buttonClass" name = "websubmit" type = "submit" style = "position: absolute;left:54% ;top:44% ">
            ADD Contact
</button>
</form>
</body>
<?php
}
?>