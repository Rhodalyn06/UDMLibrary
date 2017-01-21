<?php
	include "../validate.html";
	$id = $_POST['type1'];
	if ($id != 0){
		echo "<div class=\"row\">";
		echo "<div class = \"col-xs-9\">";
		echo "<div class =\"form-group\" id = \"fnamex\">
				<label>First Name:</label>
				<input class =\"form-control\" id = \"fname\"name = \"firstname\" oninput=\"validateLetters(this.name)\"
				onblur =\"validateInput('fname', this.value, 'fnamex')\"/>
			</div>";
		echo "</div>";
		echo "</div>";

		
		echo "<div class=\"row\">";
		echo "<div class = \"col-xs-9\">";
		echo "<div class =\"form-group\" id =\"lnamex\">
				<label>Last Name:</label>
				<input class =\"form-control\" name = \"lastname\" oninput=\"validateLetters(this.name)\"
				id =\"lname\" onblur =\"validateInput('lname', this.value, 'lnamex')\"/>
			</div>";
		echo "</div>";
		echo "</div>";







		if ($id != 3){

			echo "<div class=\"row\">";
		echo "<div class = \"col-xs-9\">";
		echo "<div class =\"form-group\" id =\"middilename\">
				<label>Middle Name:</label>
				<input class =\"form-control\" name = \"Middlename\" oninput=\"validateLetters(this.name)\"
				id =\"middilename\" onblur =\"validateInput('middilename', this.value, 'middilename')\"/>
			</div>";
		echo "</div>";
		echo "</div>";

			echo "<div class=\"row\">";
		echo "<div class = \"col-xs-9\">";
			echo "<div class =\"form-group\" id = \"contactnum\">
					<label>Contact Number:</label>
					<input class =\"form-control\" name = \"contactnum\" maxlength=\"11\"
					oninput=\"validateNum(this.name)\" onblur=\"contactNum(this.name)\"/>
					<!--<label>09 + 9 Digits number</label>-->
				</div>";
				echo "</div>";
		echo "</div>";
			echo "<div class=\"row\">";
		echo "<div class = \"col-xs-9\">";
			echo "<div class =\"form-group\" id = \"bdayx\"><label>Birthday:</label>
			<input type = \"date\" class =\"form-control\" id =\"bday\"
					onblur =\"validateInput('bday', this.value, 'bdayx')\"/></div>";
					echo "</div>";
		echo "</div>";
			echo "<div class=\"row\">";
		echo "<div class = \"col-xs-9\">";
			echo "<div class =\"form-group\" id =\"addx\">
					<label>Address:</label>
					<input class =\"form-control\" name = \"add\"oninput=\"validateAlphaNumer(this.name)\" id =\"add\"
					onblur =\"validateInput('add', this.value, 'addx')\"/>
				</div>";
				echo "</div>";
		echo "</div>";
		}
	}
?>