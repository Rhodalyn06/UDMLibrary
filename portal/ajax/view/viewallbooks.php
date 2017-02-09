<?php
	include_once('../connection.php');
	$id = $_POST['type'];
	$sql = $conn->query("SELECT Title FROM tb_acquisition WHERE AcquisitionId='$id'");
	$row = $sql->fetch_assoc();
	session_start();
	$_SESSION['book'] = $row['Title'];
	$sql = $conn->query("SELECT a.ID as ID, a.Status as Status, b.Barcode as Barcode FROM tb_book a
	INNER JOIN tb_acquisition b ON a.AcquisitionId = b.AcquisitionId
	 WHERE b.AcquisitionId='$id' AND a.AcquisitionId='$id'");

	if (!$sql){

	}
	else{

		while(($row=$sql->fetch_assoc())==true){
			$accession = $row['ID'];
			$status = $row['Status'];
			$barcode = $row['Barcode'].'-'.$row['ID'];
			echo "<tr>";
			echo '<td><div class="checkbox"><label><input type="checkbox" class="postCheckBox" aria-barcode="'.$barcode.'">'.$barcode.'</label></div></td>';
			echo "<td>$accession</td>";
			echo "<td style='font-size:30px;'>$status</td>";
			echo "</tr>";
		}
	}
?>