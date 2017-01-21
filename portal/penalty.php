<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
    include_once('ajax/session.php');
    include_once('ajax/logout.php');

		include 'includes/style.php'
	?>
</head>
<body onload="setLink('Penalty')">
    <div id="wrapper">

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
      

 


                 <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                  <label>Penalty Price</label>
                  <input style="text-align:center;" class="form-control" id="oldPrice" disabled/>
                  <label>New Penalty Price</label>
                  <input style="text-align:center;" class="form-control" id="newPrice"/><br/>
                  <button type="button" class = "btn btn-default btn-block"onclick="changePrice()">Submit
                  </button>
                  </div>
                </div>
              </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>

        <?php
          include_once("modals/allfields.php");
        ?>


<!--  Modals-->
<div class="modal fade" id="pwsUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">ALERT</h4>
            </div>
            <div class="modal-body">
                  Penalty Price Updated!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- End Modals-->


         <!--  Modals-->
<div class="modal fade" id="qUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">ALERT</h4>
            </div>
            <div class="modal-body">
                  Do you really want to change Penalty Price?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="yChange()">Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- End Modals-->
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
    
    <script type="text/javascript">
    viewPenalty();
    function viewPenalty(){
      $.ajax({
          url: "ajax/view/penalty.php",
              type: 'POST',
              data: {},
              success: function(data){
                //$("#d").html(data);
                $("#oldPrice").val(data);
              }
        });
    }

    function changePrice(){
      var oldPrice = $("#oldPrice").val().trim();
      var newPrice = $("#newPrice  ").val().trim();
      

      if (newPrice == "" ){
        $("#allfields").modal("show");
      }
      
      else{
        $("#qUp").modal("show");
      }
    }

    function yChange(){
      var oldPrice = $("#oldPrice").val().trim();
      var newPrice = $("#newPrice").val().trim();
      
      if (newPrice == "" ){
        $("#allfields").modal("show");
      }
      else{
        $.ajax({
          url: "ajax/insert/price.php",
              type: 'POST',
              data: {type1: newPrice },
              success: function(data){
                //$("#d").html(data);
                $("#pwsUp").modal("show");
                $("#qUp").modal("hide");
                $("#newPrice").val("");
                viewPenalty();
              }
        });
      }
    }
    </script>
   
</body>
</html>
