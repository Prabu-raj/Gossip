<?php

include "LocalHostConnection";

class MySqlQuery 	{

		public $result;
		public $connection;
		public $localConnection = new LocalHostConnection();

		public function MySqlConnection()	{

			this->$connection = mysqli_connect($localConnection->$hostName , $localConnection->$userName , localConnection->$password) or die ("Unable to connect!");
    		mysqli_select_db(this->$connection, $mysql_db) or die(mysqli_error(this->$connection));

		}

		public function ExecuteQuery($query)	{

			$result = mysqli_query(this->$connection , $query) or die ("Error in query: $query. " . mysqli_error(this->$connection));

		}

		public function ReturnRows($query)	{

			$result = ExecuteQuery($query);
			$numberOfRows = mysqli_num_rows($result);
			return $numberOfRows;

		}

		//Sets the Login Status to 1 if the user is Logged In
		public function SetLoginStatus()	{

			$query = "SELECT * 
            FROM users 
            WHERE userName = '{$_POST['name']}' 
            AND userPass = '{$_POST['pass']}'";

			if ( ReturnRows($query) == 1)  {
	            setcookie('this->userName' , $_POST['name'] , time() + 1000);
	            setcookie('this->password' , $pass , time() + 0);
	            $_SESSION['this->loggedIn'] = 1;
	        }

		}
		//Returns the Login Status of the User
		public function GetLoginStatus()	{

			if( $_SESSION['this->loggedIn'] == 1)	{
				return true;
			}

			return false;

		}

}

?>