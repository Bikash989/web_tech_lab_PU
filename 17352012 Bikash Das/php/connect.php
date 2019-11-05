<?php

//database configuration
$host = "localhost";      //database host
$db = "human";    //database name
$user = "root";           //database username
$pass = "bikash1*";               //database password
$hdb = "mysql:host=".$host.";dbname=".$db;

try{
  $dbhandler = new PDO($hdb, $user, $pass);
  //if unsuccessful an exception will be thrown , that's the benefit of using PDO(php data objects) over procedural mysqli
  //sets error mode to exception, simple
  $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e) {
  echo $e->getMessage();
}

?>