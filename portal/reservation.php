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
<body onload="setLink('Reserve')">
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
                    
                    //alerts
                    include_once('modals/contact.php');
                    include_once('modals/allfields.php');
                    include_once('modals/success.php');
                    include_once('modals/delete.php');
                    include_once('modals/update.php');
                    include_once('modals/ddelete.php');
                    include_once('modals/supdate.php');
                     include_once('modals/claim.php');
                    include_once('modals/claiming.php');
                    include_once('modals/error1.php');
                    include_once('modals/error2.php');
                    include_once('modals/error3.php');
                    include_once('modals/error4.php');
                    include_once('modals/error5.php');
                ?>

                
           
                 <div class="row">
                  <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel">
                        <div class="panel-heading" style="font-family:'MYRIAD PRO REGULAR';">
                          Manage Reservations
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tblBook">
                                    <thead>
                                
                                        <th><strong>
                                          BORROWER ID
                                        </th></strong>
                                        <th><strong>
                                          BORROWER NAME
                                        </th></strong>
                                        <th><strong>
                                          TITLE
                                        </th></strong>
                                        <th><strong>
                                          STATUS
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

            url: "ajax/view/reservation.php",
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

      function claims(str){
        $("#claim").modal("show");
        id = str;
      }

      function yclaim(){

        $.ajax({

            url: "ajax/insert/reservation.php",
            type: 'POST',
            data: {type: id},
            success: function(data){
             $("#claim").modal("hide");
             $('#claiming').modal('show');
              viewDetails();
              //window.open("ajax/reports/borrower.php?trans="+data);
              //alert(data);
     
            }
          });
    }


      
       
      
    </script>

</body>
</html>
