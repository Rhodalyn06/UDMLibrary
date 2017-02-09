<?php
	include_once('../connection.php');
	$id = $_POST['type'];
	$sql = $conn->query("SELECT * FROM tb_book WHERE AcquisitionId = '$id'");
	$row = $sql->fetch_assoc();
	$sub = $row['SubAuthors'];

	$arr = explode(",", $sub);
	$sql = $conn->query("Drop table hahax");
	$sql = $conn->query("Create table hahax (id int, author varchar(100))");
	for ($i = 0; $i < count($arr)-1; $i++){
		$h = $i + 1;
		$author = trim($arr[$i]);
		$sql = $conn->query("INSERT into hahax (id, author) VALUES('$h', '$author')");
	}


	$sql = $conn->query("SELECT * FROM hahax");

	if (!$sql){

	}
	else{
		
		while(($row=$sql->fetch_assoc())==true){
			$x = $row['id'];
			$fname = $row['author'];
			echo "<tr onclick = 'editsub1($x)'>";
			echo "<td>$x</td>";
			echo "<td>$fname</td>";
			echo "</tr>";
		}
	}
?>