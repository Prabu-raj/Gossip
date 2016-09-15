<div id =chat class="Favorites" >
			<a class = "tab" style = "color: #deb887;" href="http://localhost/PDBMS/PHP_FILES/chat.php">Favorites</a> </div>	
				<div id =chat class="Favorites" >	
			<a class = "tab" style = "color: #84470c;" href="http://localhost/PDBMS/PHP_FILES/chat.php"><b>Favorites</b></a>
		</div>
<?php
	session_start();
	include_once 'includes.php';
	if (isset($_SESSION['loggedIn']) == 1){

		$query = "SELECT Name
			FROM userTable , FriendList
			WHERE Favorites = 1
			AND FriendList.FriendNumber = userTable.PhoneNumber
				AND FriendList.PhoneNumber = '{$_SESSION['PhoneNumber']}'";
				//echo"wtf";
		$result = $db->query($query);
		$rows[]=NULL;
		   for ($a = 1 ; $a <= $db->connection->affected_rows; $a++ ) {

		   		$rows[] = $result->fetch_assoc();

		   }
		 ?>
		 <link rel = "stylesheet" type = "text/css" href = "http://localhost0/PDBMS/Images/CSS_FILES/classes.css">
		<div class = "border_ppl">
		<div class = "ppl" style = "left:16%;top:0%;"> 
		 <pre><?php for ($a = 1 ; $a <= $db->connection->affected_rows; $a++ ) {
		 			echo("<b>".$rows[$a]['Name' ]."</b><br>"); }?> </pre>
		 		</div>
		 	</div>
			
<?php
		}
  	
?>