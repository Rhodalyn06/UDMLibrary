<?php
	include_once("../connection.php");
	include_once('../session.php');
	$user = $_SESSION["id"];
	$id = $_POST['type'];
	$date = date("Y-m-d");
	$sql = $conn->query("SELECT BorrowerID FROM tb_borrower WHERE UserID = '$user'");
	$row = $sql->fetch_assoc();

	$borrower = $row["BorrowerID"];
	$bookOnHand = $row["BookOnHand"] + 1;
	$bookLimit=2;

	if ($bookOnHand == $bookLimit){
			echo "error2";
		

		$sql1 = $conn->query("SELECT * FROM tb_borrowandreturn WHERE AccessionID ='$id' And ActualDateReturned='0000-00-00'");
		$sql2 = $conn->query("SELECT * FROM tb_reservation WHERE AccessionID ='$id' And Status='Reserved'");
		if (mysqli_num_rows($sql1) != 0 || mysqli_num_rows($sql2) !=0){
				echo "Book Reserved";
			}
			else{
				$sql=$conn->query("INSERT into tb_reservation (BookID, BorrowerID, DateReserved, Status) VALUES ('$id', '$borrower', '$date', 'Reserved')");
				if ($sql){
					$sql = $conn->query("UPDATE tb_book SET Status='Reserved' WHERE ID = '$id'");
					if ($sql){
						$sql = $conn->query("UPDATE tb_borrower SET BookOnHand='$bookOnHand' WHERE BorrowerID='$borrower'");
					}
				}
				else{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}else{

			$sql=$conn->query("INSERT into tb_reservation (BookID, BorrowerID, DateReserved, Status) VALUES ('$id', '$borrower', '$date', 'Reserved')");
			if ($sql){
				$sql = $conn->query("UPDATE tb_book SET Status='Reserved' WHERE ID = '$id'");
				if ($sql){
					$sql = $conn->query("UPDATE tb_borrower SET BookOnHand='$bookOnHand' WHERE BorrowerID='$borrower'");
				}
			}
			else{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	}
?>