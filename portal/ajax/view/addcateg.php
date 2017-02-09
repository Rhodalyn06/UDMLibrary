<?php
	include "../validate.html";
	$id = $_POST['type1'];
	if ($id == 3){

		echo "<div class=\"row\">";
		echo "<div class = \"col-xs-9\">";
		echo "<div class =\"form-group\" id = \"ctgnamex\">
				<label>New Acquisition of Book:</label>
				<input class =\"form-control\" id = \"ctgname\"name = \"Category\" oninput=\"validateLetters(this.name)\"
				onblur =\"validateInput('ctgname', this.value, 'ctgnamex')\"/>
			</div>";
		echo "</div>";
		echo "</div>";
		echo "</br>";
		echo "</br>";
   }

   else if ($id == 1){

   echo "<div class=\"row\">";
		echo "<div class = \"col-xs-9\">";
		echo "<div class =\"form-group\" id = \"bkcategx\">
				<label>New Book Category:</label>
				<input class =\"form-control\" id = \"bkcateg\"name = \"Book Category\" oninput=\"validateLetters(this.name)\"
				onblur =\"validateInput('bkcateg', this.value, 'bkcategx')\"/>
			</div>";
		echo "</div>";
		echo "</div>";
		echo "</br>";
		echo "</br>";
		
   }
	
?>