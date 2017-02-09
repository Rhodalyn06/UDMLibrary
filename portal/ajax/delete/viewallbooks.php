<?php
	$arrBarcode = explode(',', rtrim($_POST['type'], ','));
	include_once('../connection.php');

	for ($x = 0; $x < count($arrBarcode)-1; $x++){
		$id = substr($arrBarcode[$x],11);
		$sql = $conn->query("DELETE FROM tb_book WHERE ID ='$id' and Status='Available'");

		$sql1 = $conn->query("SELECT a.NoOfCopies AS NoOfCopies, b.AcquisitionId AS AcquisitionId 
			FROM tb_acquisition a INNER JOIN tb_book b ON a.AcquisitionId = b.AcquisitionId WHERE b.ID = '$id'");
		$row = $sql1->fetch_assoc();
		$AcquisitionId = $row['AcquisitionId'];
		$NoOfCopies = $row['NoOfCopies']-1;

		if ($sql){
			$sql2 = $conn->query("UPDATE tb_acquisition SET NoOfCopies='$NoOfCopies' WHERE AcquisitionId='$AcquisitionId'");
		}
	}
?>
