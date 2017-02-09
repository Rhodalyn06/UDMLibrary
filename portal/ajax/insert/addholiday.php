<?php
	include_once("../connection.php");

	$name = $_POST['type'];
	$day = $_POST['type1'];

	$sql = $conn->query("INSERT into tb_holidays (HolidayName, HolidayDate) VALUES ('$name', '$day')");
?>