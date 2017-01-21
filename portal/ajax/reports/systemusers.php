<!DOCTYPE html>
<html>
<head>
	<title>List of System Users </title>
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
			<img src = "../../img/udm.jpg">
		</center>
	</div>
	<div class = "col-xs-12" style = "font-size:30px">
		<center>
Web Based Library System For Universidad de Manila<br />
			List of System Users<br/>
		</center>
	</div>
	<div class = "col-xs-12" style = "font-size:10px">
		<div style="text-align: right;">From: <?php echo $_GET['from']; ?><br/> To: <?php echo $_GET['to']; ?> </style>
	</div>
</div>
<br/>

	
<table class="table table-striped table-bordered table-hover"  width="100%">
	<thead>
		<th>ID</th>
		<th>Name</th>
		<th>User Type</th>
		<th>Status</th>
	</thead>
	<tbody>

<?php
	$from = $_GET['from'];
	$to = $_GET['to'];

	include_once("../connection.php");

	$sql = $conn->query("SELECT * FROM tb_accounts");
	if ($sql){
		while (($row=$sql->fetch_assoc())==true){
			$sql1 = false;
			if ($row["UserType"] == "tb_users")
			{
				$sql1 = $conn->query("SELECT * FROM tb_users WHERE UserName = '" . $row['UserID'] . "'");
			}
			else{
				$sql1 = $conn->query("SELECT * FROM tb_borrower WHERE UserID = '" . $row['UserID'] . "'");
			}
			if ($sql1){
				$row1 = $sql1->fetch_assoc();
				echo "<tr>";
				echo "<td>" . $row['UserID'] . "</td>";
				echo "<td>" . $row1['FirstName'] . " " . $row1['LastName'] . "</td>";
				if ($row['UserType'] == "tb_users"){
					echo "<td>Librarian</td>";
				}else{
					echo "<td>Borrower/" . $row1['BorrowerType'] . "</td>";
				}

				if ($row1["Active"] == "0"){
					echo "<td>Active</td>";
				}else{
					echo "<td>Inactive</td>";
				}
				
				echo "</tr>";
			}
		}
	}
?>

</table>

	<br/><br/>
	<div class = "col-xs-12" style="text-align: right;">
		Prepared By: __________________________
	</div>
	</tbody>
</body>
</html>
