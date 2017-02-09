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
<body onload="setLink('Search and Edit Suspension')">
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
                    include_once('modals/suspension.php');
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
                             Search & Edit Suspension
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tblBook">
                                    <thead>
                                      <tr>
                                        <td><strong>
                                          SUSPENSION NAME
                                        </td></strong>
                                        <td><strong>
                                          SUSPENSION DATE
                                        </td></strong>
                                        
                                      </tr>
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

            url: "ajax/view/suspension.php",
            type: 'POST',
            data: {},
            success: function(data){
              
              $("#f").html(data);
              $('#tblBook').dataTable();
              //alert(data);
            }
          });

        
      }

      function editDetails(str){
        id = str;
        $.ajax({

            url: "ajax/view/suspension1.php",
            type: 'POST',
            data: {type: str},
            success: function(data){
              
              $("#editsuspension").modal("show");
              $("#h").html(data);
              //alert(data);
            }
          });

        
      }

      function save(){
        var sname = $("#sName").val().trim();
        var sdate = $("#sDate").val().trim();
        if (sname == "" || sdate == ""){
          $("#allfields").modal("show");

        }
        else{
          $.ajax({

            url: "ajax/update/suspension.php",
            type: 'POST',
            data: {type: id, type1: sname, type2: sdate},
            success: function(data){
              
              
              $("#supdate").modal("show");
              $("#editsuspension").modal("hide");

              //alert(data);

              viewDetails();


            }
          });
        }
      }

     
    </script>

</body>
</html>
