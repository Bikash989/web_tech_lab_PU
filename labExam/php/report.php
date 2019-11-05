<?php
require "connect.php";

$sql = "select * from marks";

$stmnt = $dbhandler -> prepare($sql);
if($stmnt->execute())
{
	$data = $stmnt->fetchAll(PDO::FETCH_ASSOC);
	
	echo("<center><h2>Report</h2>");
	echo("<hr>");
	echo("<table border=1px><th>Registration Number</th><th>Name</th><th>Coms1 Marks</th><th>Coms2 Marks</th><th>Coms3 Marks</th><th>Coms4 Marks</th><th>Coms5 Marks</th><th>Total</th>");
	
	foreach($data as $row) {
  		$regno = $row['reg_no'];
  		$name = $row['name'];
  		$coms1 = $row['coms1'];
  		$coms2 = $row['coms2'];
  		$coms3 = $row['coms3'];
  		$coms4 = $row['coms4'];
  		$coms5 = $row['coms5'];
  		$total = $coms1 + $coms2 + $coms3 + $coms4 + $coms5;
  		echo("<tr><td>".$regno ."</td><td>".$name ."</td><td>".$coms1 ."</td><td>".$coms2 ."</td><td>".$coms3."</td><td>".$coms4."</td><td>".$coms5."</td><td>".$total."</td></tr>");
  		}
  		echo("</center>");
}
else
{
	echo "There was an error executing the query!";
}

?>