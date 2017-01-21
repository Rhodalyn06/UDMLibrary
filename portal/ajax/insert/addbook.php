<?php
	include_once('../connection.php');
	$title= clean($_POST['type']);
	$fname= clean($_POST['type1']);
	$lname= clean($_POST['type2']);
	$copyright = clean($_POST['type3']);
    $copy = clean($_POST['type4']);
    $callno = clean($_POST['type5']);
    $method = clean($_POST['type6']);
    $desc = clean($_POST['type7']);
    $price = clean($_POST['type8']);
    $isbn =clean($_POST['type9']);
    $edition = clean($_POST['type10']);
    $barcode = clean($_POST['type11']);
    $publisher = clean($_POST['type12']);
    $bkcateg = clean($_POST['type13']);
    $accno = clean($_POST['type14']);
    $series = clean($_POST['type15']);
    $vol = clean($_POST['type16']);
    $placeofpub = clean($_POST['type17']);
    $mater = clean($_POST['type18']);
    $notearea = clean($_POST['type19']);
    



    $sql = $conn->query("INSERT into tb_acquisition 
    (AcquisitionId, Barcode, Title, Author, LastName, CopyRight, Edition, CallNo, AcquisitionMet, NoOfCopies, Price, Publisher, Category, AccessionNum, Series, Volume, Placeofpub, Mater, Notearea)

    VALUES ('null', '$barcode', '$title', '$fname', '$lname', '$copyright', '$edition', '$callno', '$method', '$copy', '$price', '$publisher', '$bkcateg','$accno', '$series','$vol','$placeofpub','$mater','$notearea')");
    if ($sql){
    	$sql2 = $conn->query("SELECT * FROM tb_acquisition ORDER BY AcquisitionId DESC");
    	$row=$sql2->fetch_assoc();
    	$id = $row['AcquisitionId'];
    	$num = $row['NoOfCopies'];
    	$dateadd = date("Y-m-d");
    	//archive date set to 5 years
    	$today = date("Y-m-d");
	    $today = date_create($today);
	    $today = date_add($today, date_interval_create_from_date_string("5 Year"));
	    $archive = $today->format("Y-m-d");
    	$val = "";

    	$sub = "";
    	$sql4 = $conn->query("SELECT * FROM haha");
    	while (($row2=$sql4->fetch_assoc())==true){
    		$sub = $sub . " " . $row2['fname'] . " " . $row2['lname'] . ", ";
    	}


    	for ($i = 0; $i < $num; $i++){
    		$val = $val . "('null', '$id', '$isbn', '$dateadd', '$archive', '$sub', '$desc', 'Available')";
    		if ($i != ($num-1)){
    			$val = $val . ", ";
    		}
    	}
    	$sql1 = $conn->query("INSERT into tb_book
    		(ID, AcquisitionId, ISBN, DateBookAdded, ArchivedDateExt, SubAuthors, Description, Status)
    		 VALUES $val");
    	if ($sql1){
    		$del = $conn->query("DELETE FROM haha");

            $bb = $conn->query("SELECT * FROM tb_book WHERE AcquisitionId='" . $id . "'");
            $data = "";
            while (($bbrow = $bb->fetch_assoc())==true){
                $data = $data . $barcode . "-" . $bbrow['ID'] . ",";
            }
            echo $data;
            session_start();
            $_SESSION['book'] = $title;
    	}
    	else{
    		//echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    	}
    }
    else{
    	//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
    $str = @trim($str);
    if(get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    return $str;
}
?>