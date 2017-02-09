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
                    
                    //book viewing
                    include_once('modals/viewbook.php');

                    //editing book
                    include_once('modals/editbook.php');

                    //for viewing all list of books
                    include_once('modals/viewallbooks.php');

                    //editing subauthors
                    include_once('modals/editsubauthor.php');
                    include_once('modals/viewsubauthors.php');
                    //alerts
                    include_once('modals/contact.php');
                    include_once('modals/allfields.php');
                    include_once('modals/success.php');
                    include_once('modals/delete.php');
                    include_once('modals/update.php');
                    include_once('modals/ddelete.php');
                    include_once('modals/supdate.php');
                ?>

         
<div class="row">
                  <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel">
                        <div class="panel-heading" style="font-family:'MYRIAD PRO REGULAR';">
                           Unreturned Books
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tblUnreturned">
                                    <thead>
                                   
                                        <th><strong>
                                          BARCODE
                                        </th></strong>
                                        <th><strong>
                                          TITLE
                                        </th></strong>
                                        <th><strong>
                                          BORROWED DATE
                                        </th></strong>
                                        <th><strong>
                                          BORROWER
                                        </th></strong>
                                 
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

            url: "ajax/view/unreturned.php",
            type: 'POST',
            data: {},
            success: function(data){
              
              $("#f").html(data);
              $('#tblUnreturned').dataTable();
              //alert(data);
            }
          });

        
      }

      
      
    </script>

</body>
</html>
