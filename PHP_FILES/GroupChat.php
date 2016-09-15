<link rel = "stylesheet" type = "text/css" href = "http://localhost/Pdbms/Images/CSS_FILES/Style.css">
<?php
session_start();
include_once "includes.php";
?>
<body bgcolor = "#2079AB">
		<link rel = "stylesheet" type = "text/css" href = "http://localhost/Pdbms/Images/CSS_FILES/Classes.css">
		<div  class="GroupChats" >
			<a class = "tab" style = "color: #990000;" href="http://localhost/PDBMS/PHP_FILES/Login_Success.php">GroupChat</a> </div>	
		<div  class="GroupChats" >	
			<a class = "tab" style = "color: #d7d2d2;" href="http://localhost/PDBMS/PHP_FILES/Login_Success.php"><b>GroupChat</b></a>
		</div>
		<link rel = "stylesheet" type = "text/css" href = "http://localhost/Pdbms/Images/CSS_FILES/Style.css">
				
			<?php if (isset($_SESSION['loggedIn']) == 1){

		$query = "SELECT distinct Subject from groups,belongto 
			WHERE (groups.AdminNumber= '{$_SESSION['PhoneNumber']}' 
					or
				 belongto.MemberNum = '{$_SESSION['PhoneNumber']}' )
				and 
				groups.GroupId = belongto.GroupId ";
				
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
		 			?> <a class="Groupchater"  href="#"> <?php  echo("<b>".$rows[$a]['Subject' ]."</b></br>"); ?></a>
		 			<script >c=c+1</script>
		 			<?php }?> 
		 	</div>
		 </div>		 
<script>
		for (var i = 0 ; i < c; i++ ) {
			var fooId="groupchat";
			document.getElementsByClassName('Groupchater')[i].setAttribute('id', fooId + (i+1));
	}
</script>


<div class="Grpppl" id="friend_chat"></div>
		<div class = "groupboxer"> 
			
 				
			 	<div class ="grouper" style="position:absolute"></div>
				<textarea class="groupentry" placeholder = "Enter your text... "></textarea>
		
		 </div>
	
		 <script src ="http://localhost/PDBMS/JS/jquery.js"></script>
		<script type="text/javascript" src= "http://localhost/PDBMS/JS/groupcheckout.js"></script>
			<script type="text/javascript" src= "http://localhost/PDBMS/JS/groupchatbox.js"></script>			
</body>
                                             