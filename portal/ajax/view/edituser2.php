<?php
	include_once('../connection.php');
	include_once('../validate.html');

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


		echo "<div class=\"form-group\" id = \"userid\">";
		echo "<label style=\"font-size:15px;\">User ID</label>";
		echo "<input class = \"form-control\"value=\"$userid\" style=\"width:40%;font-size:15px;\" id = \"u\" name=\"userid\" disabled
		oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, 'userid')\">";
		echo "</div>";

		echo "<div class=\"form-group\" id = \"fname\">";
		echo "<label style=\"font-size:15px;\">First Name</label>";
		echo "<input class = \"form-control\" value=\"$fname\" name=\"fname\"
		oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, '#fname')\">";
		echo "</div>";


		/*echo "<div class=\"form-group\" id = \"lname\">";
		echo "<label>Middle Name</label>";
		echo "<input class = \"form-control\" value=\"$middilename\" name=\"middilename\"
		oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, '#middilename')\">";
		echo "</div>";

		*/

		echo "<div class=\"form-group\" id = \"lname\">";
		echo "<label style=\"font-size:15px;\">Last Name</label>";
		echo "<input class = \"form-control\" value=\"$lname\" name=\"lname\"
		oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, '#lname')\">";
		echo "</div>";

		echo "<div class=\"form-group\" id = \"postion\">";
		echo "<label style=\"font-size:15px;\">Position</label>";
		echo "<input class = \"form-control\"value=\"$postion\" style=\"width:40%;font-size:15px;\" name=\"postion\" disabled
		oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, 'postion')\">";
		echo "</div>";

	}
	else{
		$sql = $conn->query("SELECT * FROM tb_borrower WHERE UserID='" . $userid . "'");
		$row = $sql->fetch_assoc();
		$userid = $row['UserID'];
		$fname = $row['FirstName'];
		
		$lname = $row['LastName'];
		$BorrowerType = $row['BorrowerType'];
		$Address = $row['Address'];
		$middilename = $row['middilename'];
		

		echo "<div class=\"form-group\" id = \"userids\">";
		echo "<label style=\"font-size:15px;\">User ID</label>";
		echo "<input class = \"form-control\"value=\"$userid\" name=\"userid\" disabled
		oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, 'userid')\">";
		echo "</div>";

		echo "<div class=\"form-group\" id = \"fname\">";
		echo "<label style=\"font-size:15px;\">First Name</label>";
		echo "<input class = \"form-control\" value=\"$fname\" name=\"fname\"
		oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, '#fname')\">";
		echo "</div>";

		
		echo "<div class=\"form-group\" id = \"middilename\">";
		echo "<label style=\"font-size:15px;\">Middle Initial (Optional)</label>";
		echo "<input class = \"form-control\" value=\"$middilename\" name=\"middilename\"
		oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, '#middilename')\">";
		echo "</div>";
		

		echo "<div class=\"form-group\" id = \"lname\">";
		echo "<label style=\"font-size:15px;\">Last Name</label>";
		echo "<input class = \"form-control\" value=\"$lname\" name=\"lname\"
		oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, '#lname')\">";
		echo "</div>";

		echo "<div class=\"form-group\" id = \"btype\">";
		echo "<label style=\"font-size:15px;\">Borrower Type</label>";
		echo "<select class = \"form-control\" name=\"btype\"
		oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, '#btype')\">";
		echo "<option value = \"STUDENT\" ";
		if($BorrowerType == "STUDENT"){
			echo "Selected";
		}
		echo ">Student</option>";
		echo "<option value = \"FACULTY\" ";
		if($BorrowerType == "FACULTY"){
			echo "Selected";
		}
		echo ">Faculty</option>";
		echo "</select>";
		echo "</div>";

		echo "<div class=\"form-group\" id = \"address\">";
		echo "<label style=\"font-size:15px;\">Address</label>";
		echo "<input class = \"form-control\" value=\"$Address\" name=\"address\"
		oninput =\"validateAlphaNumer(this.name)\" onblur=\"check(this.value, '#address')\">";
		echo "</div>";


	}


?>