<?php
	include "../connection.php";
	$type = trim($_POST['type']);
	$fname = ucfirst(trim($_POST['fname']));
	$lname = ucfirst(trim($_POST['lname']));
	

	if ($type == 3){
		if ($fname == "" || $lname == ""){
			echo "fail";
		}
		else{
			$id = "";
			$date = date("Y");
			$sql1 = $conn->query("SELECT * FROM tb_users where UserName like
				'UDMLib-$date%' ORDER BY UserName DESC");

			if ($sql1){
				if (mysqli_num_rows($sql1)==0){
					$id = "UDMLib-" . $date . "0001";
					//echo "try";
				}else{
					$row = $sql1->fetch_assoc();
					$x = $row['UserName'];
					$x = str_replace("UDMLib-", "", $x);
					//echo $x;
					$x = intval($x) + 1;
					$id = "UDMLib-" . $x;
					//echo 'try';
				}
			}
			else{
				//echo "try";
				$id = "UDMLib-" . $date . "0001";
			}
			//$fname = strtoupper($fname);
			//$lname = strtoupper($lname);

			$sql = $conn->query("INSERT into tb_users (UserID, UserName, Password, FirstName, LastName, Active)
				VALUES ('null', '$id', '$id', '$fname', '$lname', '0')");
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
	else{
		$bday = $_POST['bday'];
		$contactnum = $_POST['contactnum'];
		$address = trim($_POST['address']);
		$middilename =$_POST['middilename'];
		$id = "";
		$types="";
		if ($type == 1){
			$id = "UDMStu-";
			$types="STUDENT";
		}
		else{
			$id = "UDMFac-";
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
				BorrowerType, ContactNo, BookOnHand, Birthday, Address, middilename)
				VALUES ('null', '$id', '$id', '$fname', '$lname', '0', '$types', '$contactnum', '0', '$bday', '$address' , '$middilename')");
			if ($sql){
				$sql2 = $conn->query("INSERT into tb_accounts(accntID, UserID, UserType, Password)
					VALUES('null', '$id', 'tb_borrower', '$id')");
			}
			echo "done";

	}
?>