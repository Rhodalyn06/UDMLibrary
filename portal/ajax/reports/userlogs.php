<!DOCTYPE html>
<html>
<head>
	<title>List of User Logs</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="shortcut icon" href="../../img/udm.jpg">
</head>
<body>
<style>
table, td, th {
    border: 1px solid green;
}

th {
    background-color: green;
    color: white;
    text-align: center;
}
</style>
<div style="margin: 30px;">
	
	<div class = "col-xs-12">
		<center>
				<img src = "../../img/udm.jpg" height="200px;">
		</center>
	</div>
	<div class = "col-xs-12" style = "font-size:30px">
		<center>
Web Based Library System For Universidad de Manila<br />
			List of User Logs<br/>
		</center>
	</div>
	<div class = "col-xs-12" style = "font-size:20px">
		<div style="text-align: right;">From: <?php echo $_GET['from']; ?><br/> To: <?php echo $_GET['to']; ?> </style>
	</div>
</div>
<br/>

	
<table class="table table-striped table-bordered table-hover"  width="100%">
	<thead>
	    <th>User ID </th>
		<th>Name</th>
		<th>Day</th>
		<th>Login</th>
	</thead>
	<tbody>


<?php
	include_once("../connection.php");

	$from = $_GET['from'];
	$to = $_GET['to'];
	$sql = $conn->query("SELECT a.day as day, a.login as login, b.FirstName as fname, b.LastName as lname, a.userid as user FROM 
		tb_audittrail a INNER JOIN tb_borrower b ON a.userid = b.UserID WHERE day between '$from' and 

'$to'");
	

	if ($sql){
		while (($row=$sql->fetch_assoc())==true){
			$user = $row['user'];
			$day = $row['day'];
			$login = $row['login'];
			$name = $row['fname'] . " " . $row['lname'];
			echo "<tr>";
			echo "<td>$user</td>";
			echo "<td>$name</td>";
			echo "<td>$day</td>";
			echo "<td>$login</td>";
			echo "</tr>";
		}
	}
?>



</tbody>
</table>
</body>
</html>
