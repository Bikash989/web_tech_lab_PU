<?php
require "connect.php";

$regno = $_POST["regno"];

$sql = "select * from marks where reg_no = ?";

$stmnt = $dbhandler -> prepare($sql);
if($stmnt->execute(array($regno)))
{
	$data = $stmnt->fetchAll(PDO::FETCH_ASSOC);
?>
<body>
	<center>
<?php	
	echo("<center><h2>Result for <b>".$regno."</b></h2>");
	echo("<hr>Name: <b>".$data[0]["name"]);
	echo("<br>"); 	 
	echo("<table border=1px><th>Course</th><th>Marks</th>");
	// echo("</b><hr><br>Marks for coms1: <b>".$data[0]["coms1"]);
	// echo("</b><br>Marks for coms2: <b>".$data[0]["coms2"]);
	// echo("</b><br>Marks for coms3: <b>".$data[0]["coms3"]);
	// echo("</b><br>Marks for coms4: <b>".$data[0]["coms4"]);
	// echo("</b><br>Marks for coms5: <b>".$data[0]["coms5"]);
	echo ("<tr><td>Coms1</td>");
	echo("<td>".$data[0]["coms1"]);
	echo("</td></tr>");

	echo ("<tr><td>Coms2</td>");
	echo("<td>".$data[0]["coms2"]);
	echo("</td></tr>");
	
	echo ("<tr><td>Coms3</td>");
	echo("<td>".$data[0]["coms3"]);
	echo("</td></tr>");
	
	echo ("<tr><td>Coms4</td>");
	echo("<td>".$data[0]["coms4"]);
	echo("</td></tr>");
	
	echo ("<tr><td>Coms5</td>");
	echo("<td>".$data[0]["coms5"]);
	echo("</td></tr>");
	   //coms1 , coms2,...are columns in the database
	$total = $data[0]["coms1"] + $data[0]["coms2"] + $data[0]["coms3"] + $data[0]["coms4"] + $data[0]["coms5"] ;
	//echo ("Total = ".$total);
	echo ("<tr rowspan=2><td><b>Total = ".$total);
	echo("</b></td></tr>");
	echo("</center>");
}
else
{
	echo "There was an error executing the query!";
}

?>