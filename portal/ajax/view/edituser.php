
<?php
    
    include_once('../connection.php');

    $type = $_POST['type'];
    $sql1 = "";
    if ($type == "1"){
        $sql = $conn->query("SELECT * FROM tb_accounts");
    }
    else if ($type == "2" || $type == "4" || $type == "5"){
        $sql = $conn->query("SELECT * FROM tb_accounts WHERE UserType = 'tb_borrower'");
    }
    else if ($type == "3"){
        $sql = $conn->query("SELECT * FROM tb_accounts WHERE UserType = 'tb_users'");
    }

    while(($row=$sql->fetch_assoc())==true){
        $userid = $row['UserID'];
        $type2 = $row['UserType'];
        $type1 = "";
        if ($type2 == "tb_users"){
            $sql1 = $conn->query('SELECT * FROM ' . $row['UserType'] . " WHERE UserName='" . $userid . "' and Active='0'");
            
        }
        else{
            if ($type == "2"){
                $sql1 = $conn->query("SELECT * FROM tb_borrower WHERE UserID='" . $userid . "' and Active='0'");
            }
            else if ($type == "4"){
                $sql1 = $conn->query("SELECT * FROM tb_borrower WHERE UserID='" . $userid . "' and Active='0' AND BorrowerType='STUDENT'");
            }
            else if ($type == "5"){
                $sql1 = $conn->query("SELECT * FROM tb_borrower WHERE UserID='" . $userid . "' and Active='0' AND BorrowerType='FACULTY'");
            }
            else if ($type == "1"){
                $sql1 = $conn->query("SELECT * FROM tb_borrower WHERE UserID='" . $userid . "' and Active='0'");
            }
            //$type1 = "HAHA";
        }
        if ($sql1){
            if (mysqli_num_rows($sql1) != 0){
                $row1 = $sql1->fetch_assoc();
                $fname = $row1['FirstName'];
                $lname = $row1['LastName'];
                
                if ($type2 == "tb_users"){
                    $type1 = "Librarian";

                }
                else{
                    $type1 = $row1['BorrowerType'];
                    
                }
                echo "<tr onclick=\"viewuser('$userid', '$type2')\">";
                echo "<td>$userid</td>";
                echo "<td>$fname</td>";
                echo "<td>$lname</td>";
                echo "<td>$type1</td>";
                echo "</tr>";
            }
        }
    }
?>
