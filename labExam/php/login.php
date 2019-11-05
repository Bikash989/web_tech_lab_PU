<?php
require "connect.php";

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "select * from admin where name=? and password=?";
	//a dbhandler is prepared with the query and returned to $stmnt (statment variable) which is later used in the program
$stmnt = $dbhandler -> prepare($sql); //query is sent and parsed and stored in the database for later exectution

if($stmnt->execute(array($username, $password)))  //execute func takes an array of values
{
	$data = $stmnt->fetchAll(PDO::FETCH_ASSOC); //fetch all in associative array mode, it will give us in key:pair values
	if(count($data) == 1)	////our query will give us one result, checked and moved to redirected page
	{
		header("location:/project/new_upload.html");
	}
	else   //user entered wrong username and password
	{
		echo "Invalid username or password";
	}

}
else //error in the query syntax
{
	echo "There was an error executing the query!";
}