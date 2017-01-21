<?php
	include_once('../connection.php');

	$id = clean($_POST['type']);
	$callno = clean($_POST['type1']);
	$title = clean($_POST['type2']);
	$lname = clean($_POST['type3']);
	$fname = clean($_POST['type4']);
	$edition = clean($_POST['type5']);
	$copyright = clean($_POST['type6']);
	$isbn = clean($_POST['type7']);
	$method = clean($_POST['type8']);
	$price = clean($_POST['type9']);
	$bkcateg = clean($_POST['type10']);

	if ($callno != "" || $title != "" || $lname != "" || $fname != "" || $edition
		 != "" || $copyright != "" || $isbn != "" || $method != "" || $price != "" || $bkcateg != ""){
		$sql = $conn->query("UPDATE tb_acquisition SET Title='$title', CallNo='$callno',
			 Author='$fname', Lastname='$lname', Edition='$edition', CopyRight='$copyright',
			 AcquisitionMet='$method', Price='$price', Category='$bkcateg' WHERE AcquisitionId='$id'");
		if ($sql){
			$sql = $conn->query("UPDATE tb_book SET ISBN='$isbn' WHERE AcquisitionId='$id'");
			echo $id;
		}
		echo "no";
	}




function clean($str) {
    $str = @trim($str);
    if(get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    return $str;
}
?>