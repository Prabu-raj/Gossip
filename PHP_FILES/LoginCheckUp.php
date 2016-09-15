<?php

include "MySqlQuery"

class LoginCheckUp	{

	public $userName;
	public $password;
	public $loggedIn;

	//Checks whether the user submitted the form or not
	//Checks whether the user entered the correct details
	public function CheckUser()	{
		if (isset($_POST['name'] , $_POST['pass']) || isset($_COOKIE['name'] , $_COOKIE['pass']))  {

        	if (isset($_COOKIE['name'] , $_COOKIE['pass'])) {
            	this->$userName = mysql_real_escape_string($_COOKIE['name']);
            	this->$password = mysql_real_escape_string($_COOKIE['pass']);
        	}else {
            	this->$userName = mysql_real_escape_string($_POST['name']);
            	this->$password = sha1($_POST['pass']);
        	}	

      		if (empty($_POST['name']) && empty($_POST['pass'])) {
            	die("Enter the UserName and Password");
      		}

        }

        if (!$MySqlQuery->GetLogInStatus()) {
            die("Invalid UserName and Password");
        }

	}

}
?>