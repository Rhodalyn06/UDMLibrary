<?php

	
	include_once('../connection.php');

	$sql = $conn->query("SELECT * FROM tb_acquisition");

	while(($row=$sql->fetch_assoc())==true){
		$title = $row['Title'];
		$author = $row['Author'] . " " . $row['Lastname'];
		$edition = $row['Edition'];

		$id = $row['AcquisitionId'];
		$avail = mysqli_num_rows($conn->query("Select * from tb_book WHERE AcquisitionId='$id' and Status='Available'"));
		$loan = mysqli_num_rows($conn->query("Select * from tb_book WHERE AcquisitionId='$id' and Status='On Loan'"));
		$res = mysqli_num_rows($conn->query("Select * from tb_book WHERE AcquisitionId='$id' and Status='Reserved'"));
		$dam = mysqli_num_rows($conn->query("Select * from tb_book WHERE AcquisitionId='$id' and Status='Damage'"));
		$lost = mysqli_num_rows($conn->query("Select * from tb_book WHERE AcquisitionId='$id' and Status='Lost'"));
		$x = "";
		if ($avail != 0){
			$x = $x . "<span class='label label-info'>Available</span> " . $avail;
			if ($loan != 0 || $res != 0 || $dam != 0 || $lost != 0){
				$x = $x . ", ";
			}
		}
		if ($loan != 0){
				$x = $x . "<span class='label label-success'>On Loan</span>" . $loan;
			if ($res != 0 || $dam != 0 || $lost != 0){
				$x = $x . ", ";
			}
		}
		if ($res != 0){
			$x = $x . "<span class='label label-primary'>Reserve</span>" . $res;
			if ($dam != 0 || $lost != 0){
				$x = $x . ", ";
			}
		}
		if ($lost != 0){
			$x = $x . "<span class='label label-warning'>Lost</span>" . $lost;
			if ($dam != 0){
				$x = $x . ", ";
			}
		}
		if ($dam != 0){
			$x = $x . "<span class='label label-danger'>Damage</span> " . $dam;
		}

		echo "<tr onclick=\"viewbook('$id')\">";
		echo "<td>$title</td>";
		echo "<td>$author</td>";
		echo "<td>$edition</td>";
		echo "<td>$x</td>";
		echo "</tr>";

	}
?>