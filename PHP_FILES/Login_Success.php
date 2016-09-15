
<?php
	session_start();
	include_once 'includes.php';

	if (isset($_SESSION['loggedIn']) == 1){
		$_SESSION['Groupchatid']= ' ';
		$_SESSION['chat_friend']= ' ';
		$query1= "UPDATE usertable set OnlineStatus=1 where PhoneNumber= '{$_SESSION['PhoneNumber']}'";
		$db->query($query1);
		$query = "SELECT Name
			FROM userTable 
			WHERE  userTable.PhoneNumber = '{$_SESSION['PhoneNumber']}'";	

		$result = $db->query($query);
		$query = "SELECT Name
			FROM userTable 
			WHERE  userTable.Email = '{$_SESSION['PhoneNumber']}'";	
		$row = mysqli_fetch_array($result) ;
		if (mysqli_num_rows($result) == 1)
		echo "<p>  <font color=blue size='8'> &nbsp;&nbsp; Welcome </font> <font color=red size='7'>$row[Name]</font></p>";  
	    else {
	    $result2 = $db->query($query);
		$row = mysqli_fetch_array($result2) ;
		echo " <p> <font color=black  size='8'> &nbsp;&nbsp;Welcome </font> <font color=red size='7'>$row[Name]</font></p>";  
	}
	
?>
	
	<html>
		<link rel = "stylesheet" type = "text/css" href = "http://localhost/PDBMS/Images/CSS_FILES/Style.css">
		<head>
			<!--script bgcolor = "#00FF99" type='text/javascript'>
  		


  				function Chats()
  					{
                      var d = document.getElementById("chat");
                      d.innerHTML = "<b> Chat</b> <textarea class='chatentry' placeholder = 'Enter your text... '></textarea> ";
                      
  					}
			</script>
			<script bgcolor = "#00FF99" type='text/javascript'>
  				function Favourites()
  					{
                      var d = document.getElementById("Fav");
                      d.innerHTML = "<body bgcolor= #FFFFFF> vijay</body> <b> Favorites</b> <P style = 'border: 1px solid #000000;padding:3px;' > Vijay </p> "; 
  					}
			</script-->
		</head>

		<body bgcolor = "deb887" link="#003333" alink="#003333" vlink="#003333">
			<link rel = "stylesheet" type = "text/css" href = "http://localhost/PDBMS/Images/CSS_FILES/Classes.css">
		 <img class = "imagePosition" src ="http://localhost/PDBMS/IMAGES/red.jpg">
		<form action = "http://localhost/PDBMS/PHP_FILES/Delete.php">
			<button  class = "buttonClass" name="DeleteAccount" type = "submit" style="position:absolute; top:1%; right:15%;">
    						Delete account
			</button>
		</form>
		<form action = "http://localhost/PDBMS/PHP_FILES/Logout.php">
			<button  class = "buttonClass" name="Logout" type = "submit" style="position:absolute; top:1%; right:2%;">
    						LogOut
			</button>
		</form>
 
		
		<div class="Contacts">
			<a class = "tab" style = "color: #ffffff;" href="http://localhost/PDBMS/PHP_FILES/FirstTime.php">People</a>
		</div>
	
		<div id =chat class="Chats">
			<!--a href="http://localhost/PdBMS/PHP_FILES/chat.php" onclick =>Chats</a-->
			<a class = "tab" style = "color: #ffffff;" href="http://localhost/PDBMS/PHP_FILES/chat.php">Chats</a>

		</div>
		
		<div class="GroupChats">
			<a class = "tab" style = "color: #ffffff;" href="http://localhost/PDBMS/PHP_FILES/GroupChat.php">GroupChat</a>
		</div>
		<div class = "Groups">
			<a class ="tab" style = "color: #ffffff;" href="http://localhost/PDBMS/PHP_FILES/groupbox.php">Group</a>
		</div>
		<div class = "block"> 
			<a class ="tab" style = "color: #ffffff;" href="http://localhost/PDBMS/PHP_FILES/blockbox.php">Block Contact</a>
		</div>

       

       <div id="puthere" style = "top:30%"></div>


		<script src ="http://localhost/PDBMS/JS/jquery.js"></script>
		<script type="text/javascript" src= "http://localhost/PDBMS/JS/letstry.js"></script>
</body>		
</html>


<?php
	}
?>
		