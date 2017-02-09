<?php

	
	include_once('../portal/ajax/connection.php');

	$txt1 = $_POST['txt1'];
	$txt2 = $_POST['txt2'];
	$txt3 = $_POST['txt3'];
	$select1 = $_POST['select1'];
	$select2 = $_POST['select2'];
	$select3 = $_POST['select3'];

	$opt1 = $_POST['opt1'];
	$opt2 = $_POST['opt2'];
	
	$q1 = getSelect($select1, $txt1);
	$q2 = getSelect($select2, $txt2);
	$q3 = getSelect($select3, $txt3);
	
	if ($txt2 == "")
	{
		$q1 = "$q1 or ";
	}
	else{
		if ($opt1 == "not"){
			$q1 = "$q1 and not";
		}
		else{
			$q1 = "$q1 $opt1 ";
		}
	}
	if ($txt3 == ""){
		$q2 = "$q2 or ";
	}
	else{
		if ($opt2 == "not"){
			$q2 = "$q2 and not ";
		}
		else{
			$q2 = "$q2 $opt2";
		}
		
		
	}
	
	if ($txt1 == "" and $txt2 == "" and $txt3==""){
		$sql = $conn->query("SELECT * FROM tb_acquisition");
	}
	else{
		$sql = $conn->query("SELECT * FROM tb_acquisition WHERE $q1 $q2 $q3");

		
	}

	if (!$sql){
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	else{
		while(($row=$sql->fetch_assoc())==true){
		$title = $row['Title'];
		$author = $row['Author'] . " " . $row['Lastname'];
		$edition = $row['Edition'];

		$id = $row['AcquisitionId'];
		$avail = mysqli_num_rows($conn->query("Select * from tb_book WHERE AcquisitionId='$id' and Status='Available'"));
		$loan = mysqli_num_rows($conn->query("Select * from tb_book WHERE AcquisitionId='$id' and Status='On Loan'"));
		$res = mysqli_num_rows($conn->query("Select * from tb_book WHERE AcquisitionId='$id' and Status='Reserve'"));
		$dam = mysqli_num_rows($conn->query("Select * from tb_book WHERE AcquisitionId='$id' and Status='Damage'"));
		$lost = mysqli_num_rows($conn->query("Select * from tb_book WHERE AcquisitionId='$id' and Status='Lost'"));
		$x = "";
		if ($avail != 0){
			$x = $x . "Available: " . $avail;
			if ($loan != 0 || $res != 0 || $dam != 0 || $lost != 0){
				$x = $x . ", ";
			}
		}
		if ($loan != 0){
				$x = $x . "On Loan: " . $loan;
			if ($res != 0 || $dam != 0 || $lost != 0){
				$x = $x . ", ";
			}
		}
		if ($res != 0){
			$x = $x . "Reserved: " . $res;
			if ($dam != 0 || $lost != 0){
				$x = $x . ", ";
			}
		}
		if ($lost != 0){
			$x = $x . "Lost: " . $lost;
			if ($dam != 0){
				$x = $x . ", ";
			}
		}
		if ($dam != 0){
			$x = $x . "Damage: " . $dam;
		}

		echo "<tr onclick=\"viewbook('$id')\">";
		echo "<td>$title</td>";
		echo "<td>$author</td>";
		echo "<td>$edition</td>";
		echo "<td>$x</td>";
		echo "</tr>";

	}
	}

	function getSelect ($select, $txt){
		if ($select == "1"){
				$out = "Title ='$txt'";
			}
			else if ($select == "2"){
				$out = "Author='$txt' or Lastname='$txt'";
			}
			else{
				$out = "Edition='$txt'";
			}
			return $out;
		}
?>