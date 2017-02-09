<!DOCTYPE html>
<html>
<head>
	<title>List of Penalties Paid</title>
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
			List of Penalties Paid<br/>
		</center>
	</div>
	<div class = "col-xs-12" style = "font-size:20px">
		<div style="text-align: right;">From: <?php echo $_GET['from']; ?><br/> To: <?php echo $_GET['to']; ?> </style>
	</div>
</div>
<br/>

	
<table class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<th>Accession Number</th>
		<th>Barcode</th>
		<th>Copyright</th>
		<th>Title</th>
		<th>Borrower's Name</th>
		<th>Date Borrowed</th>
		<th>Date Returned</th>
		<th>Penalty</th>
	</thead>
	<tbody>

<?php
	$from = $_GET['from'];
	$to = $_GET['to'];

	include_once("../connection.php");

	$sql = $conn->query("SELECT * FROM tb_acquisition");
	if ($sql){
		while (($row=$sql->fetch_assoc())==true){
			$id = $row["AcquisitionId"];
			$sql1 = $conn->query("SELECT b.AccessionID as AccessionID, a.ID as ID, b.Penalty, b.DateBorrowed as DateBorrowed, c.FirstName as fname, c.LastName as lname, b.ActualDateReturned FROM tb_book a INNER JOIN tb_borrowandreturn b ON a.ID=b.AccessionId INNER JOIN tb_borrower c ON b.BorrowerID = c.BorrowerID WHERE a.AcquisitionId='$id' and b.ActualDateReturned BETWEEN '$from' and '$to' and b.Penalty != '0'");
			$f = mysqli_num_rows($sql1);
			if ($f == 1){

			}else{
				/*echo "<tr align='center' style='font-size: 20px;'>";
				echo "<td rowspan='$f'>" . $row["Barcode"] . "</td>";
				echo "<td rowspan='$f'>" . $row["CopyRight"] . "</td>";
				echo "<td  rowspan='$f'>" . $row["Title"] . "</td>";
				echo "</tr>";*/
				$cnt = 0;
				while (($row1=$sql1->fetch_assoc())==true){
					echo "<tr  align='center'>";
					
					echo "<td>" . $row1["ID"] . "</td>";

					if ($cnt == 0){
						echo "<td rowspan='$f'>" . $row["Barcode"] . "</td>";
						echo "<td rowspan='$f'>" . $row["CopyRight"] . "</td>";
						echo "<td  rowspan='$f'>" . $row["Title"] . "</td>";
					}
					$cnt = 1;
					echo "<td>" . $row1["fname"] . " " . $row1['lname'] . "</td>";
					echo "<td>" . $row1["DateBorrowed"] . "</td>";
					echo "<td>" . $row1["ActualDateReturned"] . "</td>";
					echo "<td>" . $row1["Penalty"] . "</td>";
					echo "</tr>";
				}
			}
			
		}
	}
?>

</table>

	<br/><br/>
		<div class = "col-xs-12" style="text-align: right;">
			Prepared By: Librarian
		</div>
                 <br/><br/>
		<div class = "col-xs-12" style="text-align: right;">
			Date: <?php echo date("M d, Y"); ?>
		</div>
		</tbody>
</body>
</html>
