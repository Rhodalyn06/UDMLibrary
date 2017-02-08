<?php
	include_once('../connection.php');
	include_once('../validate.html');
	$id = $_POST['type'];

	$sql = $conn->query("SELECT * FROM tb_acquisition WHERE AcquisitionId ='$id'");

	$row = $sql->fetch_assoc();
	$barcode = $row['Barcode'];
	$title = $row['Title'];
	$fname = $row["Author"];
	$lname = $row['Lastname'];
	$copyright = $row['CopyRight'];
	$copy = $row['NoOfCopies'];
	$edition = $row['Edition'];
	$callno = $row['CallNo'];
	$method = $row['AcquisitionMet'];
	$price = $row['Price'];
	$bkcateg = $row['Category'];

	$sql = $conn->query("SELECT * FROM tb_book WHERE AcquisitionId='$id'");

	$row = $sql->fetch_assoc();

	$isbn = $row['ISBN'];
	$sub = $row['SubAuthors'];

 
	
	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Barcode</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$barcode\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\">";
	echo "<label style=\"font-size:15px;\">Acquisition ID</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" id=\"11a\" value=\"$id\" disabled/>";
	echo "</div>";

	echo "<div class=\"form-group\" id=\"1f\">";
	echo "<label style=\"font-size:15px;\">Call Number</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$callno\" name =\"callnum\"
	oninput=\"validateNum('this.name')\" id=\"1a\" 
	onblur=\"check(this.value, '#1f')\"/>";
	echo "</div>";

	echo "<div class=\"form-group\" id=\"2f\">";
	echo "<label style=\"font-size:15px;\">Title</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$title\" name=\"title\"
	oninput=\"validateTitle('this.name')\" id=\"2a\" 
	onblur=\"check(this.value, '#2f')\"/>";
	echo "</div>";

	echo "<div class=\"form-group\" id=\"3f\">";
	echo "<label style=\"font-size:15px;\">Author's Last name</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$lname\" name=\"lname\" 
	oninput=\"validateLetters('this.name')\" id=\"3a\" 
	onblur=\"check(this.value, '#3f')\"/>";
	echo "</div>";

	echo "<div class=\"form-group\" id=\"4f\">";
	echo "<label style=\"font-size:15px;\">Author's First Name</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$fname\" name=\"fname\" 
	oninput=\"validateLetters('this.name')\" id=\"4a\" 
	onblur=\"check(this.value, '#4f')\"/>";
	echo "</div>";

	echo "<div class=\"form-group\" id=\"5f\">";
	echo "<label style=\"font-size:15px;\">Edition</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$edition\" name=\"edition\" 
	oninput=\"validateAlphaNumer('this.name')\" id=\"5a\" 
	onblur=\"check(this.value, '#5f')\"/>";
	echo "</div>";

	echo "<div class=\"form-group\" id=\"6f\">";
	echo "<label style=\"font-size:15px;\">Copyright</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$copyright\" name=\"copyright\" 
	oninput=\"validateAlphaNumer('this.name')\" id=\"6a\"
	onblur=\"check(this.value, '#6f')\"/>";
	echo "</div>";

	echo "<div class=\"form-group\" id=\"7f\">";
	echo "<label style=\"font-size:15px;\">ISBN</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$isbn\" name=\"isbn\" oninput=\"validateAlphaNumer('this.name')\"  id=\"7a\"  onblur=\"check(this.value, '#7f')\" />";
	echo "</div>";

	


	echo "<div class=\"form-group\" id=\"9f\">";
	echo "<label style=\"font-size:15px;\">Price</label>";
	echo "<input class=\"form-control\" style=\"width:40%;font-size:15px;\" value=\"$price\" name=\"price\" 
	oninput=\"validateNum('this.name')\" maxlength=\"4\" id=\"9a\"
	onblur=\"check(this.value, '#9f')\"/>";
	echo "</div>";

	
	
?>


<div class="form-group" id="8f">
	<label style="font-size:15px;">Acquisition Method</label>

	<select class="form-control" style="height:50px;width:40%;" id="8a"
	onblur="check(this.value, '#8f')">
	 <?php

  include_once('../connection.php');
  
  $sql = $conn->query("SELECT * FROM tb_category");
  while(($row=$sql->fetch_assoc())==true){

    ?>
    <option  value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
    <?php } 
    ?>
     
        </select>
      </div>

	


 <div class = "form group" id = "10f">
        <label style="font-size:15px;">Category</label>
   
        <select class ="form-control" style="height:50px;width:40%;" id = "10a" 
        onblur="check(this.value, '#10f')">

         <?php

  include_once('../connection.php');
  
  $sql = $conn->query("SELECT * FROM tb_categoryy");
  while(($row=$sql->fetch_assoc())==true){

    ?>
    <option value="<?php echo $row['bkcategory']; ?>"><?php echo $row['bkcategory']; ?></option>
    <?php } 
    ?>
            
        </select>
      </div>
