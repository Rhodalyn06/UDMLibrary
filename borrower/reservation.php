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
<body onload="setLink('Reserve Books')">
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
                    <div class="row">
                    <div class="col-md-6">
                    <div class="alert alert-info">
                  <strong><span class="glyphicon glyphicon-info-sign"> </span>&nbsp;Double Click the book you want to reserve</strong><br><br>
                  </div>
                  </div>
                  </div>
                <div class = "row">
                  <div class = "col-md-6">
                    <select id = "filter" class="form-control" style="height:45px;">
                      <option value = "Title">Title</option>
                      <option value = "Author">Authors</option>
                      <!--<option value = "Barcode">Barcode</option>-->
                    </select>
                  </div>
                  <div class = "col-md-6">
                    <input class = "form-control" id="txtFilter" />
                  </div>
                </div><br/>
                <div class = "row">
                  <div class = "col-md-3">
                    <button class="btn btn-success btn-block" onclick="search()">Search <span class="glyphicon glyphicon-search"></span></button>
                  </div>
                </div>
                <br/>
                <!-- FOR TABLE -->
               
  
        <div class="row">
                  <div class="col-md-12">
                    <!-- Advanced Tables -->
                   
                        <div class="panel-heading">
                           Reserve Books
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tblBook">
                                    <thead>
                                      <tr>
                                        <td>
                                          Title
                                        </td>
                                        <td>
                                          Authors
                                        </td>
                                        <td>
                                          Edition
                                        </td>
                                           <td>
                                          Call No
                                        </td>
                                        <td>
                                          Status
                                        </td>
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
                <!-- /FOR TABLE -->
                <?php
                  include_once("modals/error.php");
                  include_once("modals/q.php");
                  include_once("modals/success.php");
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
      include_once('includes/scripts.php');

    ?>
    
    <script type="text/javascript">
    var gg = "";
    function search(){
      var filter = $("#filter").val();
      var txtFilter = $("#txtFilter").val().trim();
      $("#txtFilter").val(txtFilter);
      $.ajax({

            url: "ajax/view/reservation.php",
            type: 'POST',
            data: {type: filter, type1: txtFilter},
            success: function(data){
              
              $("#f").html(data);
              $('#tblBook').dataTable();
              //alert(data);


            }
          });
    }

    function reserve(str){
      $.ajax({

            url: "ajax/view/reservation1.php",
            type: 'POST',
            data: {type: str},
            success: function(data){
              
              if (data == "error"){
                $("#error").modal("show");
                //alert(data);
              }
              else{
                $("#q").modal("show");
                //alert(data);
                gg = str;
              }
              //alert(data);


            }
          });
    }

    function resYes(){

      $.ajax({

            url: "ajax/inserts/reservation.php",
            type: 'POST',
            data: {type: gg},
            success: function(data){
              $("#q").modal("hide");
              $("#success").modal("show");
              
              search();

            }
          });
    }
    </script>

</body>
</html>
