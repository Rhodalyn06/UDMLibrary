<?php
	include "../validate.html";
	$id = $_POST['type1'];
	if ($id == 5){

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

  
	
?>