<?php
	include_once('../connection.php');


	$userid = $_POST['type'];
	$type = $_POST['type1'];

	$sql = "";
	if ($type=="tb_users"){
		$sql = $conn->query("SELECT * FROM tb_users WHERE UserName='" . $userid . "'");
		$row = $sql->fetch_assoc();
		$userid = $row['UserName'];
		$fname = $row['FirstName'];
		$lname = $row['LastName'];
		echo "<div class=\"form-group\">";
		echo "<label>User ID</label>";
		echo "<input class = \"form-control\" id = 'userid' value=\"$userid\" disabled>";
		echo "</div>";

		echo "<div class=\"form-group\">";
		echo "<label>First Name</label>";
		echo "<input class = \"form-control\" value=\"$fname\" disabled>";
		echo "</div>";
         
		/*echo "<div class=\"form-group\">";
		echo "<label>Middle Name</label>";
		echo "<input class = \"form-control\" value=\"$middilename\" disabled>";
		echo "</div>";
		*/
		echo "<div class=\"form-group\">";
		echo "<label>Last Name</label>";
		echo "<input class = \"form-control\" value=\"$lname\" disabled>";
		echo "</div>";

	}
	else{
		$sql = $conn->query("SELECT * FROM tb_borrower WHERE UserID='" . $userid . "'");
		$row = $sql->fetch_assoc();
		$userid = $row['UserID'];
		$fname = $row['FirstName'];
		
		$lname = $row['LastName'];
		$BorrowerType = $row['BorrowerType'];
		$ContactNo = $row['ContactNo'];
		$Birthday = $row['Birthday'];
		$Address = $row['Address'];
		$middilename = $row['middilename'];
		
		echo "<div class=\"form-group\">";
		echo "<label>User ID</label>";
		echo "<input class = \"form-control\" id = 'userid' value=\"$userid\" disabled>";
		echo "</div>";

		echo "<div class=\"form-group\">";
		echo "<label>First Name</label>";
		echo "<input class = \"form-control\" value=\"$fname\" disabled>";
		echo "</div>";

		echo "<div class=\"form-group\">";
		echo "<label>Middle Name</label>";
		echo "<input class = \"form-control\" value=\"$middilename\" disabled>";
		echo "</div>";
		
		echo "<div class=\"form-group\">";
		echo "<label>Last Name</label>";
		echo "<input class = \"form-control\" value=\"$lname\" disabled>";
		echo "</div>";

		echo "<div class=\"form-group\">";
		echo "<label>Borrower Type</label>";
		echo "<input class = \"form-control\" value=\"$BorrowerType\" disabled>";
		echo "</div>";

		echo "<div class=\"form-group\">";
		echo "<label>Contact Number</label>";
		echo "<input class = \"form-control\" value=\"$ContactNo\" disabled>";
		echo "</div>";

		echo "<div class=\"form-group\">";
		echo "<label>Birthday</label>";
		echo "<input class = \"form-control\" value=\"$Birthday\" disabled>";
		echo "</div>";

		echo "<div class=\"form-group\">";
		echo "<label>Address</label>";
		echo "<input class = \"form-control\" value=\"$Address\" disabled>";
		echo "</div>";

		
		


	}


?>