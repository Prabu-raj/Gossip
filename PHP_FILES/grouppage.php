<?php
session_start();
include_once "includes.php";

class chatapp extends LocalHostConnection {
		
		public function getmsg() {	

				$query3 = "SELECT userTable.Name,belongto.Time,belongto.chat from userTable,belongto WHERE
				belongto.GroupId = '{$_SESSION['Groupchatid']}' and 
				belongto.MemberNum = userTable.PhoneNumber AND 
				belongto.chat is NOT NULL
				order by belongto.Time desc";
				
				$result = $this->connection->query($query3);

				return $result;

		}


		public function putmsg($msg) {
			
				date_default_timezone_set('Asia/Kolkata');
				$dateTime = date('Y-m-d H:i:s');
			
				$this->connection->query(
					"insert into belongto values (
					'{$_SESSION['Groupchatid']}',
					'{$_SESSION['PhoneNumber']}',
					'{$dateTime}',
					'{$msg}')") ;
		        
		}	

}
//'" .$this->connection->real_escape_string(htmlentities($msg)) . " ',
?>
