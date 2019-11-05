<?php
require "connect.php";

$sql = "insert into marks (reg_no, name, coms1, coms2, coms3, coms4, coms5) values (?, ?, ?, ?, ?, ?, ?)";

$stmnt = $dbhandler -> prepare($sql);
if($stmnt->execute(array($_POST["regno"], $_POST["name"], $_POST["coms1"], $_POST["coms2"], $_POST["coms3"], $_POST["coms4"], $_POST["coms5"])))
{
	echo("Insert successful!");
	echo("<br>");
	echo("<a href=/17352012 bikash das/new_upload.html> Enter new value</a>");
	echo("<br>");
	echo("<a href = /17352012 bikash das/index.html> main page</a>");

}
else
{
	echo "There was an error executing the query!";
}

?>
