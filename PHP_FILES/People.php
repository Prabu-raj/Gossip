<div id =chat class="People" >
			<a class = "tab" style = "color: #B3B0B5;" href="http://localhost/PDBMS/PHP_FILES/chat.php">People</a> </div>	
				<div id =chat class="People" >	
			<a class = "tab" style = "color: #B3B0B5;" href="http://localhost/PDBMS/PHP_FILES/chat.php"><b>People</b></a>
		</div>
<?php
	$a=10;
	session_start();
	include_once 'includes.php';
	if (isset($_SESSION['loggedIn']) == 1){
		$query = "SELECT distinct Name 
			FROM userTable , FriendList
			WHERE  FriendList.FriendNumber = userTable.PhoneNumber
				AND FriendList.PhoneNumber = '{$_SESSION['PhoneNumber']}'";
				
		$result = $db->query($query); ?>
		<?php
			$rows[]=NULL;
		   for ($a = 1 ; $a <= $db->connection->affected_rows; $a++ ) {

		   		$rows[] = $result->fetch_assoc();

		   }
		 ?>
		 <link rel = "stylesheet" type = "text/css" href = "http://localhost/PDBMS/Images/CSS_FIL1ES/classes.css">
		<div class = "border_ppl">
		<div class = "ppl" style = "left: 16%;top: 0%;"> 
		 <pre><?php for ($a = 1 ; $a <= $db->connection->affected_rows; $a++ ) {
		 			echo("<b>".$rows[$a]['Name' ]."</b><br>"); }?> </pre>
			
           	
           </div>
       </div>
            		 <?php
     		 }
		
?>