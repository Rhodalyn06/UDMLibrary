<?php

	
	include_once('../connection.php');

	$txt1 = $_POST['txt1'];
	$txt3 = $_POST['txt3'];
	$select1 = $_POST['select1'];
	$select3 = $_POST['select3'];

	$opt1 = $_POST['opt1'];
	
	$q1 = getSelect($select1, $txt1);
	$q3 = getSelect($select3, $txt3);
	
	
	$sql="";
	if ($txt1 == "" and  $txt3==""){
		$sql = $conn->query("SELECT * FROM tb_acquisition");
	}
	else{
		
		if ($txt1 == ""){
			$sql = $conn->query("SELECT * FROM tb_acquisition WHERE $q3");
		}
		else if ($txt3 == ""){
			$sql = $conn->query("SELECT * FROM tb_acquisition WHERE $q1");
		}
		else{
			if ($opt1 == "and"){
				$sql = $conn->query("SELECT * FROM tb_acquisition WHERE $q1 and $q3");
			}
			else if ($opt1 == "or"){
				$sql = $conn->query("SELECT * FROM tb_acquisition WHERE $q1 or $q3");
			}
			else{
				$sql = $conn->query("SELECT * FROM tb_acquisition WHERE $q1 and not $q3");
			}
		}

		
	}

	if (!$sql){
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	else{
		while(($row=$sql->fetch_assoc())==true){
		$title = $row['Title'];
		$author = $row['Author'] . " " . $row['Lastname'];
		$edition = $row['Edition'];
		$category = $row['Category'];

		$id = $row['AcquisitionId'];
		$avail = mysqli_num_rows($conn->query("Select * from tb_book WHERE AcquisitionId='$id' and Status='Available'"));
		$loan = mysqli_num_rows($conn->query("Select * from tb_book WHERE AcquisitionId='$id' and Status='On Loan'"));
		$res = mysqli_num_rows($conn->query("Select * from tb_book WHERE AcquisitionId='$id' and Status='Reserved'"));
		$dam = mysqli_num_rows($conn->query("Select * from tb_book WHERE AcquisitionId='$id' and Status='Damage'"));
		$lost = mysqli_num_rows($conn->query("Select * from tb_book WHERE AcquisitionId='$id' and Status='Lost'"));
		$x = "";
		if ($avail != 0){
			$x = $x . "<span class='label label-info'>Available</span>" . $avail;
			if ($loan != 0 || $res != 0 || $dam != 0 || $lost != 0){
				$x = $x . ", ";
			}
		}
		if ($loan != 0){
				$x = $x . "<span class='label label-success'>On Loan</span> " . $loan;
			if ($res != 0 || $dam != 0 || $lost != 0){
				$x = $x . ", ";
			}
		}
		if ($res != 0){
			$x = $x . "<span class='label label-primary'>Reserve</span>" . $res;
			if ($dam != 0 || $lost != 0){
				$x = $x . ", ";
			}
		}
		if ($lost != 0){
			$x = $x . "<span class='label label-warning'>Lost</span>" . $lost;
			if ($dam != 0){
				$x = $x . ", ";
			}
		}
		if ($dam != 0){
			$x = $x . "<span class='label label-danger'>Damage</span> " . $dam;
		}

		echo "<tr onclick=\"viewbook('$id')\">";
		echo "<td>$title</td>";
		echo "<td>$author</td>";
		echo "<td>$edition</td>";
		echo "<td>$category</td>";
		echo "<td>$x</td>";
		echo "</tr>";

	}
	}

	function getSelect ($select, $txt){
		if ($select == "1"){
				$out = "Title like '%$txt%'";
			}
			else if ($select == "2"){
				$out = "Author like '%$txt%' or Lastname like '%$txt%'";
			}
			else{
				$out = "Edition like '%$txt%'";
			}
			return $out;
		}
?>