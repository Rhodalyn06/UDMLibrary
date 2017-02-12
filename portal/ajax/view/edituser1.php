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
		$postion = $row['position'];

		echo "<div class=\"form-group\">";
		echo "<label style=\"font-size:15px;\">User ID</label>";
		echo "<input class = \"form-control\" style=\"width:40%;font-size:15px;\" id = 'userid' value=\"$userid\" disabled>";
		echo "</div>";

		echo "<div class=\"form-group\">";
		echo "<label style=\"font-size:15px;\">First Name</label>";
		echo "<input class = \"form-control\" style=\"width:40%;font-size:15px;\" value=\"$fname\" disabled>";
		echo "</div>";

		echo "<div class=\"form-group\">";
		echo "<label style=\"font-size:15px;\">Last Name</label>";
		echo "<input class = \"form-control\" style=\"width:40%;font-size:15px;\" value=\"$lname\" disabled>";
		echo "</div>";

		echo "<div class=\"form-group\">";
		echo "<label style=\"font-size:15px;\">Position</label>";
		echo "<input class = \"form-control\" style=\"width:40%;font-size:15px;\" value=\"$postion\" disabled>";
		echo "</div>";

	}
	else if ($type=="tb_borrower"){
		$sql = $conn->query("SELECT * FROM tb_borrower WHERE UserID='" . $userid . "'");
		$row = $sql->fetch_assoc();
		$userid = $row['UserID'];
		$fname = $row['FirstName'];
		$pasx = $row['Password'];
		$lname = $row['LastName'];
		$BorrowerType = $row['BorrowerType'];

		$Address = $row['Address'];
		$middilename = $row['middilename'];
		$email = $row['email'];

		echo "<div class=\"form-group\">";
		echo "<label style=\"font-size:15px;\">User ID</label>";
		echo "<input class = \"form-control\" style=\"width:40%;font-size:15px;\" id = 'userid' value=\"$userid\" disabled>";
		echo "</div>";


		echo "<div class=\"form-group\">";
		echo "<label style=\"font-size:15px;\">Password</label>";
		echo "<input class = \"form-control\" style=\"width:40%;font-size:15px;\" value=\"$pasx\" disabled>";
		echo "</div>";


		echo "<div class=\"form-group\">";
		echo "<label style=\"font-size:15px;\">First Name</label>";
		echo "<input class = \"form-control\" style=\"width:40%;font-size:15px;\" value=\"$fname\" disabled>";
		echo "</div>";

		echo "<div class=\"form-group\">";
		echo "<label style=\"font-size:15px;\">Middle Initial (Optional)</label>";
		echo "<input class = \"form-control\" style=\"width:40%;font-size:15px;\" value=\"$middilename\" disabled>";
		echo "</div>";

		echo "<div class=\"form-group\">";
		echo "<label style=\"font-size:15px;\">Last Name</label>";
		echo "<input class = \"form-control\" style=\"width:40%;font-size:15px;\" value=\"$lname\" disabled>";
		echo "</div>";

		echo "<div class=\"form-group\">";
		echo "<label style=\"font-size:15px;\">Borrower Type</label>";
		echo "<input class = \"form-control\" style=\"width:40%;font-size:15px;\" value=\"$BorrowerType\" disabled>";
		echo "</div>";


		echo "<div class=\"form-group\">";
		echo "<label style=\"font-size:15px;\">Address</label>";
		echo "<input class = \"form-control\" style=\"width:40%;font-size:15px;\" value=\"$Address\" disabled>";
		echo "</div>";

		echo "<div class=\"form-group\">";
		echo "<label style=\"font-size:15px;\">Email</label>";
		echo "<input class = \"form-control\" style=\"width:40%;font-size:15px;\" value=\"$email\" disabled>";
		echo "</div>";





	}


	else if ($type=="tb_alumni"){
		$sql = $conn->query("SELECT * FROM tb_alumni WHERE UserID='" . $userid . "'");
		$row = $sql->fetch_assoc();
		$userid = $row['UserID'];
		$fname = $row['FirstName'];
		$pasx = $row['password'];
		$lname = $row['LastName'];

		$middilename = $row['middilename'];

		echo "<div class=\"form-group\">";
		echo "<label style=\"font-size:15px;\">User ID</label>";
		echo "<input class = \"form-control\" style=\"width:40%;font-size:15px;\" id = 'userid' value=\"$userid\" disabled>";
		echo "</div>";

			echo "<div class=\"form-group\">";
		echo "<label style=\"font-size:15px;\">First Name</label>";
		echo "<input class = \"form-control\" style=\"width:40%;font-size:15px;\" value=\"$fname\" disabled>";
		echo "</div>";

		echo "<div class=\"form-group\">";
		echo "<label style=\"font-size:15px;\">Middle Initial (Optional)</label>";
		echo "<input class = \"form-control\" style=\"width:40%;font-size:15px;\" value=\"$middilename\" disabled>";
		echo "</div>";

		echo "<div class=\"form-group\">";
		echo "<label style=\"font-size:15px;\">Last Name</label>";
		echo "<input class = \"form-control\" style=\"width:40%;font-size:15px;\" value=\"$lname\" disabled>";
		echo "</div>";

		echo "<div class=\"form-group\">";
		echo "<label style=\"font-size:15px;\">Password</label>";
		echo "<input class = \"form-control\" style=\"width:40%;font-size:15px;\" value=\"$pasx\" disabled>";
		echo "</div>";









	}


?>
