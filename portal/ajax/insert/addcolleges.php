<?php
	include "../connection.php";
	$type = $_POST['type'];
	$collges = $_POST['collges'];
	
	if ($type == 5){
		if ($collges == ""){
			echo "fail";
		}
		else{
			
			$sql = $conn->query("INSERT INTO tb_colleges (id,colleges) VALUES 
            ('null', '$collges')");
			
		}
		 echo "done";
	}
	


?>