<?php
	include_once("../connection.php");
	include_once("../session.php");
	$user = $_SESSION['id'];
	$id = $_POST['type'];

	$sql = $conn->query("SELECT * FROM tb_book WHERE ID='$id' and Status='Available'");

	if ($sql){
		if (mysqli_num_rows($sql)==0){
			echo 'error';
		}
		else{
			$sql = $conn->query("SELECT * FROM tb_borrower WHERE UserID='$user'");
			$row=$sql->fetch_assoc();

			if ($row['BookOnHand'] >= 3){
				echo "error";
			}
		}
	}
	else{
		echo "error";
	}
?>