<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
    include_once('ajax/session.php');
    include_once('ajax/logout.php');

		include 'includes/style.php';
    include 'ajax/validate.html';


	?>
</head>
<body onload="setLink('View Unreturned Books')">
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
                    
                    
                ?>

                

      
        <div class="row">
                  <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-green">
                        <div class="panel-heading">
                        View Unreturned Books
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tblBook">
                                    <thead>
                                   
                                        <th>
                                          Barcode
                                        </th>
                                        <th>
                                          Title
                                        </th>
                                        <th>
                                          Date Borrowed
                                        </th>
                                  
                                    </thead>
                                    <tbody id = "f">
                                    </tbody>
                                    <!--<div id = "f">
                                    </div>-->
                                </table>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <?php
      include_once('includes/scripts.php');

    ?>
    <script type="text/javascript">

      var id = "";
      var gg="";
      viewDetails();
      //for table viewing
      function viewDetails(){
        $.ajax({

            url: "ajax/view/unreturn.php",
            type: 'POST',
            data: {},
            success: function(data){
              
              $("#f").html(data);
              $('#tblBook').dataTable();
              //alert(data);
            }
          });

        
      }
      //for modal viewing
      function viewbook(str){
        id = "";
        gg = "";
        id = str;
        gg=str;
        $.ajax({

            url: "ajax/view/editbook1.php",
            type: 'POST',
            data: {type: str},
            success: function(data){
              $("#g").html(data);

              $('#view').modal('show');
              //alert(data);
            }
          });
      }

      
      
    </script>

</body>
</html>
