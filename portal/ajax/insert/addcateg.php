<?php
	include "../connection.php";
	$type = $_POST['type'];
	$ctgname = $_POST['ctgname'];
	
	if ($type == 3){
		if ($ctgname == ""){
			echo "fail";
		}
		else{
			
			$sql = $conn->query("INSERT INTO tb_category (id,category) VALUES 
            ('null', '$ctgname')");
			
		}
		 echo "done";
	}
	


?>