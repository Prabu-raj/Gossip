<?php

class LocalHostConnection	{


    public $connection;
    public $DatabaseName; 

    //Constructore to set up the connection 
    public function __construct()	{
    	$hostName = "localhost";
    	$userName = "root";
    	$password = "";
    	$this->DatabaseName = 'Whats_App';

    	$this->connection = mysqli_connect($hostName, $userName, $password) or die('Could not connect to DB.');
    	mysqli_select_db($this->connection, $this->DatabaseName) or die('Could not select DB.');


    }

    public function __destruct()	{
    	mysqli_close($this->connection);
    }

    public function query($query)	{
    	$result = mysqli_query($this->connection , $query) or die ("Error in query: $query. " . mysqli_error($this->connection));
    	return $result;
    }

    public function GetDBName()	{
    	return $this->DatabaseName;
    }

}

?>