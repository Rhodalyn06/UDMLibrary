
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

  <?php
    include_once('ajax/session.php');
    include_once('ajax/logout.php');

    include 'includes/style.php'

  ?>
</head>
<body onload="setLink('Add User')">
    <div id="wrapper">
      
                <?php
                  include_once('includes/header.php')
                ?>  
        
           <!-- /. NAV TOP  -->
        <?php
            include_once('includes/nav.php')
        ?>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
               <?php
                  include_once('includes/name.php')
                ?>
                 <!-- /. ROW  -->
                 <hr />
              
   <?php

include_once('../connection.php');
        if(isset($_POST['submit'])){
      $UserName = $_POST['UserName'];
      $Password = $_POST['Password'];
      $FirstName = $_POST['FirstName'];
      $LastName = $_POST['LastName'];
      $position = $_POST['position'];
      
      $sql = $conn->query("insert into tb_users  VALUES ('','$UserName',
                                                                '$Password',
                                                                '$FirstName',
                                                                '$LastName',
                                                                '0',
                                                                '$position')");
            if($sql){
                ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Success!</strong>
                </div>
                <?php
            } else{
                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Danger!</strong> Something's wrong with the Process! 
                </div>
                <?php
            }
        }
        ?>
    <br/>
   <form method="post">
 <div class="row">
<div class = "col-xs-6">
<div class ="form-group" id ="username">
        <label>Username</label>
        <input type="text" class="form-control" id="UserName" name="UserName"  placeholder="Username" required>
      </div>
</div>
</div>

 <div class="row">
<div class = "col-xs-6">
<div class ="form-group" id ="username">
        <label>Password</label>
        <input type="text" class="form-control" id="Password" name="Password"  placeholder="Password" required>
      </div>
</div>
</div>

 <div class="row">
<div class = "col-xs-6">
<div class ="form-group" id ="username">
        <label>Firstname</label>
        <input type="text" class="form-control" id="FirstName" name="FirstName"  placeholder="First Name" required>
      </div>
</div>
</div>

 <div class="row">
<div class = "col-xs-6">
<div class ="form-group" id ="username">
        <label>Lastname</label>
        <input type="text" class="form-control" id="LastName" name="LastName"  placeholder="Last Name" required>
      </div>
</div>
</div>

 <div class="row">
<div class = "col-xs-6">
<div class ="form-group" id ="username">
        <label>Position</label>
        <select class="form-control" name="position" required>
                                                <option disabled="" value="">Choose</option>
                                                    <option>Librarian One</option>
                                                    <option>Librarian Two</option>
                                                   
                                                </select>
      </div>
</div>
</div>


  <button type="submit"  class="btn  btn-default" name="submit">Add User</button>
                              <button type="reset" class="btn btn-default" data-dismiss="modal">Clear</button>
                     
        

                                <!--- -->
                                  
                             </div>
                        
                           
        
                        </div>
        </form>

            </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <?php
      include_once('includes/scripts.php')
    ?>
    
   
</body>
</html>




