<?php
  include_once('portal/ajax/connection.php');

  $user = $_POST['type'];
  $pass = $_POST['type1'];
  $type = $_POST['type2'];

  if ($type == "1"){
    $sql = $conn->query("SELECT * FROM tb_users where UserName='$user' and Password ='$pass' and Active='0'");
    if ($sql){
      if (mysqli_num_rows($sql)==0){
        echo "fail";
      }
      else{
        echo "done";
        $row = $sql->fetch_assoc();
        session_start();
        $_SESSION['id'] = $row['UserName'];
        $_SESSION['type'] = "LIBRARIAN";
        $_SESSION['name'] = $row['FirstName'] . " " . $row['LastName'];

        $sql1=$conn->query("INSERT into tb_audittrail (logid, userid, day, login) VALUES('null','" . $row['UserName'] . "', '" .
          date("Y-m-d") . "', '" . date('H:i:s') . "')");
        if ($sql1){
          $sql2 = $conn->query("SELECT * FROM tb_audittrail WHERE userid='" . $row['UserName'] . "' ORDER BY logid DESC");
          $row1 = $sql2->fetch_assoc();
          $sql3 = $conn->query("INSERT into tb_module (moduleID, module, loginId) VALUES ('null', 'home', '" . $row1['logid'] . "')");
          $_SESSION['logid'] = $row1['logid'];
          $_SESSION['module'] = "home";
        }
      }
    }
    else{
      echo "fail";
    }
  }
  else if ($type == "2"){
    $sql = $conn->query("SELECT * FROM tb_borrower where UserID='$user' and Password ='$pass' and Active='0'");
    if ($sql){
      if (mysqli_num_rows($sql)==0){
        echo "fail";
      }
      else{
        echo "done";
        $row = $sql->fetch_assoc();
        session_start();
        $_SESSION['id'] = $row['UserID'];
        $_SESSION['type'] = $row['BorrowerType'];
        $_SESSION['name'] = $row['FirstName'] . " " . $row['LastName'];

        $sql1=$conn->query("INSERT into tb_audittrail (logid, userid, day, login) VALUES('null','" . $row['UserName'] . "', '" .
          date("Y-m-d") . "', '" . date('H:i:s') . "')");
        if ($sql1){
          $sql2 = $conn->query("SELECT * FROM tb_audittrail WHERE userid='" . $row['UserName'] . "' ORDER BY logid");
          $row1 = $sql2->fetch_assoc();
          $sql3 = $conn->query("INSERT into tb_module (moduleID, module, loginId) VALUES ('null', 'home', '" . $row1['logid'] . "')");
          $_SESSION['logid'] = $row1['logid'];
          $_SESSION['module'] = "home";
        }
      }
    }
    else{
      echo "fail";
    }
  }
?>
