<?php
	include_once("../connection.php");
	$hId = $_POST['type'];
	$hName = $_POST['type1'];
	$hDate = $_POST['type2'];
	$sql = $conn->query("UPDATE tb_holidays SET HolidayName = '$hName', HolidayDate='$hDate' Where id ='$hId'");

	
?>