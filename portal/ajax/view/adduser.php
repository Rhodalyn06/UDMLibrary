
<?php
	include "../validate.html";
	include_once('../connection.php');
	$id = $_POST['type1'];
	if ($id ==3){


		echo "<div class=\"row\">";
		echo "<div class = \"col-xs-6\">";
		echo "<div class =\"form-group\" id =\"lnamex\">
				<label style=\"font-size:20px;\">Last Name:</label>
				<input class =\"form-control\" name = \"lastname\" oninput=\"validateLetters(this.name)\"
				id =\"lname\" onblur =\"validateInput('lname', this.value, 'lnamex')\"/>
			</div>";
		echo "</div>";
		echo "</div>";


		echo "<div class=\"row\">";
		echo "<div class = \"col-xs-6\">";
		echo "<div class =\"form-group\" id = \"fnamex\">
				<label style=\"font-size:20px;\">First Name:</label>
				<input class =\"form-control\" id = \"fname\"name = \"firstname\" oninput=\"validateLetters(this.name)\"
				onblur =\"validateInput('fname', this.value, 'fnamex')\"/>
			</div>";
		echo "</div>";
		echo "</div>";



			echo "<div class=\"row\">";
		echo "<div class = \"col-xs-6\">";
		echo "<div class =\"form-group\" id = \"postionX\">
				<label style=\"font-size:20px;\">Position:</label>
				<input class =\"form-control\" id = \"postion\"name = \"positionn\" oninput=\"validateLetters(this.name)\"
				onblur =\"validateInput('postion', this.value, 'postionx')\"/>
			</div>";
		echo "</div>";
		echo "</div>";

	



	}

		if ($id == 1 || $id == 2){


		echo "<div class=\"row\">";
		echo "<div class = \"col-xs-6\">";
		echo "<div class =\"form-group\" id = \"fnamex\">
				<label style=\"font-size:20px;\">First Name:</label>
				<input class =\"form-control\" id = \"fname\"name = \"firstname\" oninput=\"validateLetters(this.name)\"
				onblur =\"validateInput('fname', this.value, 'fnamex')\"/>
			</div>";
		echo "</div>";
		echo "</div>";


		echo "<div class=\"row\">";
		echo "<div class = \"col-xs-6\">";
		echo "<div class =\"form-group\" id =\"lnamex\">
				<label style=\"font-size:20px;\">Last Name:</label>
				<input class =\"form-control\" name = \"lastname\" oninput=\"validateLetters(this.name)\"
				id =\"lname\" onblur =\"validateInput('lname', this.value, 'lnamex')\"/>
			</div>";
		echo "</div>";
		echo "</div>";



			echo "<div class=\"row\">";
		echo "<div class = \"col-xs-6\">";
		echo "<div class =\"form-group\" id =\"middilenamex\">
				<label style=\"font-size:20px;\">Middle Initial (Optional):</label>
				<input class =\"form-control\" name = \"Middlename\" 
				id =\"middilename\" />
			</div>";
		echo "</div>";
		echo "</div>";



			echo "<div class=\"row\">";
		echo "<div class = \"col-xs-6\">";
			echo "<div class =\"form-group\" id =\"addx\">
					<label style=\"font-size:20px;\">Address:</label>
					<input class =\"form-control\" name = \"add\"oninput=\"validateAlphaNumer(this.name)\" id =\"add\"
					onblur =\"validateInput('add', this.value, 'addx')\"/>
				</div>";
				echo "</div>";
		echo "</div>";
		

			echo "<div class=\"row\">";
		echo "<div class = \"col-xs-6\">";
			echo "<div class =\"form-group\" id =\"coursex\">
					<label style=\"font-size:20px;\">Course:</label>
					<input class =\"form-control\" name = \"course\"oninput=\"validateAlphaNumer(this.name)\" id =\"course\"
					onblur =\"validateInput('course', this.value, 'coursex')\"/>
				</div>";
				echo "</div>";
		echo "</div>";



			echo "<div class=\"row\">";
		echo "<div class = \"col-xs-6\">";
			echo "<div class =\"form-group\" id =\"collgx\">
					<label style=\"font-size:20px;\">College:</label>
					<input class =\"form-control\" name = \"college\"oninput=\"validateAlphaNumer(this.name)\" id =\"collg\"
					onblur =\"validateInput('collg', this.value, 'collgx')\"/>
				</div>";
				echo "</div>";
		echo "</div>";
	

	}



	if ($id ==4){


		echo "<div class=\"row\">";
		echo "<div class = \"col-xs-6\">";
		echo "<div class =\"form-group\" id = \"fnamex\">
				<label style=\"font-size:20px;\">Alumi First Name:</label>
				<input class =\"form-control\" id = \"fname\"name = \"firstname\" oninput=\"validateLetters(this.name)\"
				onblur =\"validateInput('fname', this.value, 'fnamex')\"/>
			</div>";
		echo "</div>";
		echo "</div>";


		echo "<div class=\"row\">";
		echo "<div class = \"col-xs-6\">";
		echo "<div class =\"form-group\" id =\"lnamex\">
				<label style=\"font-size:20px;\">Last Name:</label>
				<input class =\"form-control\" name = \"lastname\" oninput=\"validateLetters(this.name)\"
				id =\"lname\" onblur =\"validateInput('lname', this.value, 'lnamex')\"/>
			</div>";
		echo "</div>";
		echo "</div>";


			echo "<div class=\"row\">";
		echo "<div class = \"col-xs-6\">";
		echo "<div class =\"form-group\" id =\"middilenamex\">
				<label style=\"font-size:20px;\">Middle Initial (Optional):</label>
				<input class =\"form-control\" name = \"Middlename\" 
				id =\"middilename\" />
			</div>";
		echo "</div>";
		echo "</div>";

	}



?>


















