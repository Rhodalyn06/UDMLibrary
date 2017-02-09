<?php
	include_once("../connection.php");

	$sql = $conn->query("SELECT * from tb_price");
	$row = $sql->fetch_assoc();

	echo $row["Price"];
?>