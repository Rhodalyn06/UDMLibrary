<?php
	include "../connection.php";
	$type = $_POST['type'];
	$postion = $_POST['postion'];
	
	if ($type == 4){
		if ($postion == ""){
			echo "fail";
		}
		else{
			
			$sql = $conn->query("INSERT INTO tb_position (id,positionn) VALUES 
            ('null', '$postion')");
			
		}
		 echo "done";
	}
	


?>