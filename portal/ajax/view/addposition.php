<?php
	include "../validate.html";
	$id = $_POST['type1'];
	if ($id == 4){

		echo "<div class=\"row\">";
		echo "<div class = \"col-xs-6\">";
		echo "<div class =\"form-group\" id = \"postionx\">
				<label>New Position:</label>
				<input class =\"form-control\" id = \"postion\"name = \"Position\" oninput=\"validateLetters(this.name)\"
				onblur =\"validateInput('postion', this.value, 'postionx')\"/>
			</div>";
		echo "</div>";
		echo "</div>";
		echo "</br>";
		echo "</br>";
   }

   else if ($id == 5) {

   	echo "<div class=\"row\">";
		echo "<div class = \"col-xs-6\">";
		echo "<div class =\"form-group\" id = \"collgesx\">
				<label>Colleges:</label>
				<input class =\"form-control\" id = \"collges\"name = \"Colleges\" oninput=\"validateLetters(this.name)\"
				onblur =\"validateInput('collges', this.value, 'collgesx')\"/>
			</div>";
		echo "</div>";
		echo "</div>";
		echo "</br>";
		echo "</br>";
   }

   else if ($id == 6) { 


   	echo "<div class=\"row\">";
		echo "<div class = \"col-xs-6\">";
		echo "<div class =\"form-group\" id = \"departsx\">
				<label>Departments:</label>
				<input class =\"form-control\" id = \"departs\"name = \"Departments\" oninput=\"validateLetters(this.name)\"
				onblur =\"validateInput('departs', this.value, 'departsx')\"/>
			</div>";
		echo "</div>";
		echo "</div>";
		echo "</br>";
		echo "</br>";

   }

  
	
?>