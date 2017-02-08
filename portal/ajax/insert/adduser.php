<?php
	include "../connection.php";
	$type = trim($_POST['type']);

	$fname = ucfirst(trim($_POST['fname']));
	$lname = ucfirst(trim($_POST['lname']));

	if ($type == 3){
	
	$postion = $_POST['postion'];
		if ($fname == "" || $lname == "" || $postion == ""){
			echo "fail";
		}
		else{
			$id = "";
			$date = date("Y");
			$sql1 = $conn->query("SELECT * FROM tb_users where UserName like
				'000-$date%' ORDER BY UserName DESC");

			if ($sql1){
				if (mysqli_num_rows($sql1)==0){
					$id = "000-" . $date . "0001";
					//echo "try";
				}else{
					$row = $sql1->fetch_assoc();
					$x = $row['UserName'];
					$x = str_replace("000-", "", $x);
					//echo $x;
					$x = intval($x) + 1;
					$id = "000-" . $x;
					//echo 'try';
				}
			}
			else{
				//echo "try";
				$id = "000-" . $date . "0001";
			}
			//$fname = strtoupper($fname);
			//$lname = strtoupper($lname);

			$sql = $conn->query("INSERT into tb_users (UserID, UserName, Password, FirstName, LastName, Active, Position)
				VALUES ('null', '$id', '$id', '$fname', '$lname', '0', '$postion')");
			if ($sql){
				$sql2 = $conn->query("INSERT into tb_accounts(accntID, UserID, UserType, Password)
					VALUES('null', '$id', 'tb_users', '$id')");
				if (!$sql2){
					echo "fail";
				}
			}
			else{
				echo "fail";
			}
			echo "done";
		}
	}
	else if ($type != 3) {

		$address = trim($_POST['address']);
		$middilename =$_POST['middilename'];
		$collg = $_POST['collg'];
		$course = $_POST['course'];

		$id = "";
		$types="";
		if ($type == 1){
			$id = "001-";
			$types="STUDENT";
		}
		else{
			$id = "002-";
			$types="FACULTY";
		}

		$date = date("Y");
			$sql1 = $conn->query("SELECT * FROM tb_borrower where UserID like '" . $id .  $date . "%' ORDER BY UserID DESC");

			if ($sql1){
				if (mysqli_num_rows($sql1)==0){
					$id = $id . $date . "0001";
				}else{

					$row = $sql1->fetch_assoc();
					$x = $row['UserID'];

					$x = str_replace($id, "", $x);
					
					$x += 1;
					
					$id = $id . $x;
				}
			}
			else{
				$id = $id . $date . "0001";
			}
			//$fname = strtoupper($fname);
			//$lname = strtoupper($lname);

			$sql = $conn->query("INSERT into tb_borrower (BorrowerID, UserID, Password, FirstName, LastName, Active,
				BorrowerType, BookOnHand, Address, middilename, colleges, course)
				VALUES ('null', '$id', '$id', '$fname', '$lname', '0', '$types',  '0',  '$address' , '$middilename', '$collg','$course')");
			if ($sql){
				$sql2 = $conn->query("INSERT into tb_accounts(accntID, UserID, UserType, Password)
					VALUES('null', '$id', 'tb_borrower', '$id')");
			}
			echo "done";

	}
	else if ($type != 3) {


		
		$middilename =$_POST['middilename'];
	

		$id = "";
		$types="";
		if ($type == 4){
			$id = "000-";
			$types="ALUMNI";
		}
		else{
				echo "fail";
		}

		$date = date("Y");
			$sql1 = $conn->query("SELECT * FROM tb_alumni where UserID like '" . $id .  $date . "%' ORDER BY UserID DESC");

			if ($sql1){
				if (mysqli_num_rows($sql1)==0){
					$id = $id . $date . "0001";
				}else{

					$row = $sql1->fetch_assoc();
					$x = $row['UserID'];

					$x = str_replace($id, "", $x);
					
					$x += 1;
					
					$id = $id . $x;
				}
			}
			else{
				$id = $id . $date . "0001";
			}
			//$fname = strtoupper($fname);
			//$lname = strtoupper($lname);

			$sql = $conn->query("INSERT into tb_alumni (BorrowerID, UserID, FirstName, LastName, 
				 middilename, password, BorrowerType)
				VALUES ('null', '$id', '$fname', '$lname', '$middilename', '$id', '$types')");
			if ($sql){
				$sql2 = $conn->query("INSERT into tb_accounts(accntID, UserID, UserType, Password)
					VALUES('null', '$id', 'tb_alumni', '$id')");
			}
			echo "done";

	}
?>