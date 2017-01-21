<!DOCTYPE html>
<head>
	<?php
    include_once('ajax/session.php');
    include_once('ajax/logout.php');
    include 'includes/style.php'
	?>
</head>
<body onload="setLink('Home')">


                <?php
                  include_once('includes/header.php')
                ?>  
           <!-- /. NAV TOP  -->
                <?php
                	include_once('includes/nav.php')
                ?>  

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php
                	include_once('includes/name.php')
                ?>
                 <!-- /. ROW  -->
                 <hr />

           
               <img src="img/udm3.png" class="img-responsive" alt="SDSC LOGO" width="50%" height="auto" style="margin-left:250px;border-radius:10px;"> 

          </div>
             <!-- /. PAGE INNER  -->

            </div>


         <!-- /. PAGE WRAPPER  -->
       
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
