<!DOCTYPE html>
<html>
<head>
	<title>Book Inventory</title>
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

<div style="size: 30px;">
	<div style="margin: 30px;">
		
		<div class = "col-xs-12">
			<center>
					<img src = "../../img/udm.jpg" height="200px;">
			</center>
		</div>
		<div class = "col-xs-12" style = "font-size:30px">
			<center>
                        Web Based Library System For Universidad de Manila<br />
				Book Inventory<br/>
			</center>
		</div>
		<div class = "col-xs-12" style = "font-size:20px">
			<div style="text-align: right;">Date: <?php echo date("M d, Y"); ?> </style>
		</div>
	</div>
	<br/>

		
	<table class="table table-striped table-bordered table-hover"  width="100%">
		<thead>
		 
			<th>Accession Number</th>
			<th>Barcode</th>
			<th>Copyright</th>
			<th>Title</th>
			<th>Author</th>
			<th>Publisher</th>
		
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
				$sql1 = $conn->query("SELECT * FROM tb_book WHERE AcquisitionId='$id'");
				$f = mysqli_num_rows($sql1);
				$cnt = 0;
				
				
				while (($row1=$sql1->fetch_assoc())==true){
					echo "<tr  align='center'>";
					
					echo "<td>" . $row1["ID"] . "</td>";
					
					//echo "<td>" . $row1[""] . "</td>";

					if ($cnt == 0){
						echo "<td rowspan='$f'>" . $row["Barcode"] . "</td>";

					echo "<td rowspan='$f'>" . $row["CopyRight"] . "</td>";
					echo "<td  rowspan='$f'>" . $row["Title"] . "</td>";
					echo "<td rowspan='$f'>" . $row["Author"] . " " . $row['Lastname'] . ", " . $row["First"] . "</td>";
					echo "<td  rowspan='$f'>" . $row["Publisher"] . "</td>";
					}
					$cnt = 1;
					echo "</tr>";
				}

				/*echo "<tr align='center' style='font-size: 20px;'>";
				echo "<td rowspan='$f'>" . $row["Barcode"] . "</td>";

				echo "<td rowspan='$f'>" . $row["CopyRight"] . "</td>";
				echo "<td  rowspan='$f'>" . $row["Title"] . "</td>";
				echo "<td rowspan='$f'>" . $row["Author"] . " " . $row['Lastname'] . ", " . $row["First"] . "</td>";
				echo "<td  rowspan='$f'>" . $row["Publisher"] . "</td>";
				echo "</tr>";*/
				
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
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>
</html>

