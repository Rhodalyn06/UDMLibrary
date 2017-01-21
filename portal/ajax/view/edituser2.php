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
		echo "<div class=\"form-group\" id = \"userid\">";
		echo "<label>User ID</label>";
		echo "<input class = \"form-control\"value=\"$userid\" id = \"u\" name=\"userid\" disabled
		oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, 'userid')\">";
		echo "</div>";

		echo "<div class=\"form-group\" id = \"fname\">";
		echo "<label>First Name</label>";
		echo "<input class = \"form-control\" value=\"$fname\"
		name=\"fname\" oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, '#fname')\">";
		echo "</div>";

		/*echo "<div class=\"form-group\" id = \"lname\">";
		echo "<label>Middle Name</label>";
		echo "<input class = \"form-control\" value=\"$middilename\" name=\"middilename\"
		oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, '#middilename')\">";
		echo "</div>";

		*/
		echo "<div class=\"form-group\" id = \"lname\">";
		echo "<label>Last Name</label>";
		echo "<input class = \"form-control\" value=\"$lname\" name=\"lname\"
		oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, '#lname')\">";
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
		

		echo "<div class=\"form-group\" id = \"userids\">";
		echo "<label>User ID</label>";
		echo "<input class = \"form-control\"value=\"$userid\" name=\"userid\" disabled
		oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, 'userid')\">";
		echo "</div>";

		echo "<div class=\"form-group\" id = \"fname\">";
		echo "<label>First Name</label>";
		echo "<input class = \"form-control\" value=\"$fname\" name=\"fname\"
		oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, '#fname')\">";
		echo "</div>";

		
		echo "<div class=\"form-group\" id = \"middilename\">";
		echo "<label>Middle Name</label>";
		echo "<input class = \"form-control\" value=\"$middilename\" name=\"middilename\"
		oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, '#middilename')\">";
		echo "</div>";
		

		echo "<div class=\"form-group\" id = \"lname\">";
		echo "<label>Last Name</label>";
		echo "<input class = \"form-control\" value=\"$lname\" name=\"lname\"
		oninput =\"validateLetters(this.name)\" onblur=\"check(this.value, '#lname')\">";
		echo "</div>";

		echo "<div class=\"form-group\" id = \"btype\">";
		echo "<label>Borrower Type</label>";
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

		echo "<div class=\"form-group\" id = \"contactnum\">";
		echo "<label>Contact Number</label>";
		echo "<input class = \"form-control\" value=\"$ContactNo\" name=\"lcontactnum\"
		oninput =\"validateNumbers(this.name)\" onblur=\"check(this.value, '#contactnum')\"
		maxlength=\"11\">";
		echo "</div>";

		echo "<div class=\"form-group\" id = \"bday\">";
		echo "<label>Birthday</label>";
		echo "<input type=\"date\"class = \"form-control\" value=\"$Birthday\" name=\"bday\"
		 onblur=\"check(this.value, '#bday')\">";
		echo "</div>";

		echo "<div class=\"form-group\" id = \"address\">";
		echo "<label>Address</label>";
		echo "<input class = \"form-control\" value=\"$Address\" name=\"address\"
		oninput =\"validateAlphaNumer(this.name)\" onblur=\"check(this.value, '#address')\">";
		echo "</div>";


	}


?>