<?php
session_start();
include_once "includes.php";
?>
<html>

<body bgcolor = "#2079AB">
		<link rel = "stylesheet" type = "text/css" href = "http://localhost/Pdbms/Images/CSS_FILES/Classes.css">
		<div id =chat class="Chats" >
			<a class = "tab" style = "color: #990000;" href="http://localhost/PDBMS/PHP_FILES/Login_Success.php">Chats</a> </div>	
				<div id =chat class="Chats" >	
			<a class = "tab" style = "color: #D7d2d2;" href="http://localhost/PDBMS/PHP_FILES/Login_Success.php"><b>Chats</b></a>
		</div>
		<link rel = "stylesheet" type = "text/css" href = "http://localhost/Pdbms/Images/CSS_FILES/Style.css">
				
			<?php if (isset($_SESSION['loggedIn']) == 1){

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
		 	
		<script>
		var c = 0;
		</script>
		 <div class = "border_online_ppl">
			<div class = "ppl" style = "left:6%;top:3%;" >
		 	     <?php for ($a = 1 ; $a <= $db->connection->affected_rows; $a++ ) {
		 			?> <a class="chatperson" id ="1"  href="#"> <?php  echo("<b>".$rows[$a]['Name' ]."</b></br>"); ?></a>
		 			<script >c=c+1</script>
		 			<?php }?> 
		 	</div>
		 </div>

		 
		<script>
		for (var i = 0 ; i < c; i++ ) {
			var fooId="chat";
			document.getElementsByClassName('chatperson')[i].setAttribute('id', fooId + (i+1));
	}
</script>




<div class="ppl" id="friend_chat"></div>

		<div class = "Chatboxer"> 
				<div class ="chater"></div>
				<textarea class="chatentry" placeholder = "Enter your text... "></textarea>
		 </div>
		 <script src ="http://localhost/PDBMS/JS/jquery.js"></script>
		<script type="text/javascript" src= "http://localhost/PDBMS/JS/checkout.js"></script>
			<script type="text/javascript" src= "http://localhost/PDBMS/JS/chatbox1.js"></script>
</body>
</html>