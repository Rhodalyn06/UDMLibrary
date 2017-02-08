<?php
	include "../connection.php";
	$type = $_POST['type'];
	$departs = $_POST['departs'];
	
	if ($type == 6){
		if ($departs == ""){
			echo "fail";
		}
		else{
			
			$sql = $conn->query("INSERT INTO  tb_depart (id,departments) VALUES 
            ('null', '$departs')");
			
		}
		 echo "done";
	}
	


?>