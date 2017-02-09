<?php
	include_once("../connection.php");
	$price = $_POST['type1'];
	$sql = $conn->query("UPDATE tb_price SET Price = '$price'");
	
?>