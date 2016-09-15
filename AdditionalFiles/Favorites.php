<div id =chat class="Favorites" >
			<a class = "tab" style = "color: #deb887;" href="http://localhost/PDBMS/PHP_FILES/chat.php">Favorites</a> </div>	
				<div id =chat class="Favorites" >	
			<a class = "tab" style = "color: #84470c;" href="http://localhost/PDBMS/PHP_FILES/chat.php"><b>Favorites</b></a>
		</div>
<?php
	session_start();
	include_once 'includes.php';
	if (isset($_SESSION['loggedIn']) == 1){

			
			$var=$_SESSION['PhoneNumber'];
			$query= "call FavoritesProc111($var);";
			$result = $db->query($query);
			$row[] =NULL;
			  for ($a = 1 ; $a <= $db->connection->affected_rows; $a++ ) {
		 			$row[] = $result->fetch_assoc(); }
			for ($a = 1 ; $a <= $db->connection->affected_rows; $a++ ) {	
					echo($row[$a]['Name' ]."</b><br>"); }

			
		 ?>
		
			
<?php
		}
  	
?>