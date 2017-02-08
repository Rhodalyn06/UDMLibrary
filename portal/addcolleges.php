<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
    include_once('ajax/session.php');
    include_once('ajax/logout.php');

		include 'includes/style.php'
	?>
</head>
<body onload="setLink('Add Colleges Category')">
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
                    include_once('ajax/connection.php');
                    $sql = $conn->query("DROP TABLE haha");
                    $sql = $conn->query("CREATE TABLE haha (fname varchar(50), lname varchar(50))");

                    include_once('forms/addcolleges.php');
                    include_once('modals/allfields.php');
                    include_once('modals/success.php');
                    include_once('modals/contact.php');
                ?>

                
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

    <script>
    
</script>
</body>
</html>
