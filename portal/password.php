<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
    include_once('ajax/session.php');
    include_once('ajax/logout.php');

		include 'includes/style.php'
	?>
</head>
<body onload="setLink('Change Password')">
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
               
                 <div class="row">
                 <div class="col-md-6">
                 <div class="form-group">
                  <label style="font-size:20px;">Old Password</label>
                  <input class="form-control" type = "password" id="oldPass"/>
                  <label style="font-size:20px;">New Password</label>
                  <input class="form-control" type = "password" id="newPass"/>
                  <label style="font-size:20px;">Confirm Password</label>
                  <input class="form-control" type = "password" id="confirmPass"/><br/>

                  <div class="row">
                  <div class="col-md-4">
                  <button type="button" style="width:45%;font-size:20px;" class = "btn btn-default btn-block"onclick="changePw()">Submit
                  </button>
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

        <?php
          include_once("modals/allfields.php");
        ?>

         <!--  Modals-->
<div class="modal fade" id="checkOld" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">ALERT</h4>
            </div>
            <div class="modal-body">
                  Incorrect Password!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- End Modals-->

         <!--  Modals-->
<div class="modal fade" id="con" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">ALERT</h4>
            </div>
            <div class="modal-body">
                  Please confirm password!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- End Modals-->

         <!--  Modals-->
<div class="modal fade" id="pwUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">ALERT</h4>
            </div>
            <div class="modal-body">
                  Password Updated!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- End Modals-->


         <!--  Modals-->
<div class="modal fade" id="con" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">ALERT</h4>
            </div>
            <div class="modal-body">
                  Please confirm password!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- End Modals-->

         <!--  Modals-->
<div class="modal fade" id="pwUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">ALERT</h4>
            </div>
            <div class="modal-body">
                  Password Updated!
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
                  Do you really want to change password?
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
    function changePw(){
      var oldPass = $("#oldPass").val().trim();
      var newPass = $("#newPass").val().trim();
      var conPass = $("#confirmPass").val().trim();

      if (oldPass == "" || newPass == "" || conPass == ""){
        $("#allfields").modal("show");
      }
      else if(newPass != conPass){
        $("#con").modal("show");
      }
      else{
        $("#qUp").modal("show");
      }
    }

    function yChange(){
      var oldPass = $("#oldPass").val().trim();
      var newPass = $("#newPass").val().trim();
      var conPass = $("#confirmPass").val().trim();
      if (oldPass == "" || newPass == "" || conPass == ""){
        $("#allfields").modal("show");
      }
      else{
        $.ajax({
          url: "ajax/insert/password.php",
              type: 'POST',
              data: {type: oldPass, type1: newPass, type2: conPass},
              success: function(data){

                //$("#d").html(data);
                if (data ==false){
                  $("#checkOld").modal("show");
                  $("#qUp").modal("hide");
                }
                else{
                  $("#pwUp").modal("show");
                  $("#qUp").modal("hide");
                  $("#oldPass").val("");
                  $("#newPass").val("");
                  $("#confirmPass").val("");
                }
              }
        });
      }
    }
    </script>
   
</body>
</html>
