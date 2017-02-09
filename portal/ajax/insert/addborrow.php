<?php
	include_once('../connection.php');
	id = $_POST['type'];
	$barcode = substr($id, 0, 10);
  	$Accession = substr($id,11);
	$sql=$conn->query("INSERT into temp_borrow (BarcodeID, Accession) VALUES ('$barcode', '$Accession')");
?>