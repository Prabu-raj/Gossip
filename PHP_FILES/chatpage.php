<?php
session_start();
include_once "includes.php";

class chatapp extends LocalHostConnection {
		
		public function getmsg() {	
				$query1 = "SELECT PhoneNumber FROM userTable WHERE userTable.Name = '{$_SESSION['chat_friend']}' ";
				$result1 = $this->connection->query($query1);
				$row =$result1->fetch_assoc();
				$query = "SELECT userTable.Name,chat1.SentTime,chat1.Chat  
						FROM userTable , chat1
						WHERE (chat1.PhoneNumber = '{$_SESSION['PhoneNumber']}'
						AND chat1.FriendNumber = '{$row['PhoneNumber']}'
						AND chat1.PhoneNumber = userTable.PhoneNumber)
						or
						(chat1.PhoneNumber = '{$row['PhoneNumber']}'
						AND chat1.FriendNumber = '{$_SESSION['PhoneNumber']}'
						AND chat1.PhoneNumber = userTable.PhoneNumber)
						AND chat1.Chat is NOT NULL
						order by chat1.SentTime desc";
				
				$result = $this->connection->query($query);

				return $result;

		}


		public function putmsg($msg) {
				$query1 = "SELECT PhoneNumber FROM userTable WHERE userTable.Name = '{$_SESSION['chat_friend']}' ";
				$result1 = $this->connection->query($query1);
				$row =$result1->fetch_assoc();
				date_default_timezone_set('Asia/Kolkata');
				$dateTime = date('Y-m-d H:i:s');
				//echo $row['PhoneNumber'];
				$this->connection->query(
					"insert into chat1 values (
					'{$_SESSION['PhoneNumber']}',
					'{$row['PhoneNumber']}',
					'{$dateTime}',
					'{$msg}',
					1);" ) ;

		        
		}	

}
//'" .$this->connection->real_escape_string(htmlentities($msg)) . " ',
?>
