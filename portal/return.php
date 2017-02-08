<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
    include_once('ajax/session.php');
    include_once('ajax/logout.php');

		include 'includes/style.php';
    include 'ajax/validate.html';

    include_once('ajax/connection.php');
    $sql = $conn->query("DELETE FROM temp_return");
	?>


</head>
<body onload="setLink('Return')">
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

                    //editing subauthors
                    include_once('modals/editsubauthor.php');
                    include_once('modals/viewsubauthors.php');
                    //alerts
                    include_once('modals/contact.php');
                    include_once('modals/allfields.php');
                    include_once('modals/success.php');
                    include_once('modals/delete.php');
                    include_once('modals/addedcart.php');
                    include_once('modals/ddelete.php');
                    include_once('modals/supdate.php');
                    include_once('modals/bookadded.php');
                    include_once('modals/error1.php');
                    include_once('modals/error2.php');
                    include_once('modals/error6.php');
                    include_once('modals/error7.php');
                    include_once('modals/error8.php');
                    include_once('modals/complete.php');
                    include_once('modals/transactcomp.php');
                ?>

                
                <div class="row">
                  
                       <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="form-group">
                      <label style="font-size:18px;">Borrower's ID: </label>
                      <input class="form-control" id="stud" style="width:40%;"><br/>

                    </div>
                    <div id ="y">
                    </div>
                  </div>

                   <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="form-group">
                      <label style="font-size:18px;">Barcode: </label>
                      <input class="form-control" id="barc" style="width:40%;"><br/>
                      <button class="btn btn-default btn-block" style="width:20%;font-size:20px;" onclick="viewDetails1()">Search </button>
                  </div>

                  
                    <div id = "x">
                    </div>
                  

             

                </div>
                </div>

              

                <div class="row">
  <div class="col-md-3">
  <button class="btn btn-default btn-block" onclick="comp()" style="width:45%;font-size:20px;">Proceed</button>
  </div>
    

    <div class="col-md-3">
        <button class="btn btn-default btn-block" type="button" style="width:45%;font-size:20px;" onclick="ClearFields();">Cancel</button>

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
      var xd="";
      var ids="";
      var haha = "";
      var stud="";
      var id = "";
      var typehaha="";
      var gg = "";
      viewDetails();
      //for table viewing

      

      function checkTemp(){
        $.ajax({
            
            url: "ajax/view/return.php",
            type: 'POST',
            data: {},
            success: function(data){
              if (data == true){
                $("#stud").prop('disabled', false);
              }
              else{
                $("#stud").prop('disabled', true);
              }
            }
          });
      }

      function viewDetails(){
        //alert('try');

        $.ajax({
            
            url: "ajax/view/return.php",
            type: 'POST',
            data: {},
            success: function(data){
              $("#x").html(data);
              //alert(data);
            }
          });

        haha = stud;
      }

      function viewDetails1(){
        //alert('try');
        stud = $('#stud').val().trim();
        $('#stud').val(stud);
        xd = $('#barc').val().trim();
        $('#barc').val(xd);
        haha = stud;
        $.ajax({
            
            url: "ajax/view/return1.php",
            type: 'POST',
            data: {type: xd, type1: stud},
            success: function(data){
              $("#y").html(data);
              //alert(data);
            }
          });

        
      }

      

      function save(str, str1){
        //alert('try');
        $('#addedcart').modal('show');
        xd=str;
        gg = str1;
      }

      function no(){
        $('#addedcart').modal('hide');
      }

      function yes(){
        if (haha==""){
          $('#error1').modal('show');

          $('#addedcart').modal('hide');
        }
        else{
          var bookStat = $("#bookStat").val();
        $.ajax({

            url: "ajax/insert/return.php",
            type: 'POST',
            data: {type: xd, type1: haha, type2: gg, type3: bookStat},
            success: function(data){
              //$("#d").html(data);
              $('#addedcart').modal('hide');
              if (data == "error1"){
                $('#error1').modal('show');
              }
              else if (data == "error2"){
                $('#error2').modal('show');
              }
              else if (data == "error6"){
                $('#error6').modal("show");
              }
              else if (data == "error5"){
                $('#error5').modal("show");
              }
              else if (data == "noerror"){
                $('#bookadded').modal('show');
                viewDetails();
                $('#barc').val("");
                viewDetails1();
                checkTemp();
              }
              else{
                //alert(data);
              }
              //alert(data);
              
            }
          });
        }
      }

      function editSub(){
        if (stud==""){
          alert("NEW MODAL");
        }
        else{
          $.ajax({

            url: "ajax/view/editviewsub.php",
            type: 'POST',
            data: {type: id},
            success: function(data){
              $("#i").html(data);
              $('#view').modal('hide');
              $('#viewsub').modal('show');
              //alert(data);
              //viewDetails();
            }
          });
        }
      }

      function no(){
        //alert('try');
        //$('#edit').modal('show');
        $('#qupdate').modal('hide');
      }

      function del(str){
        //$('#view').modal('hide');
        $('#qdelete').modal('show');
        ids=str;
        //alert(ids);
      }

      function dYes(){
        var user = ids;
        $.ajax({

              url: "ajax/delete/borrow.php",
              type: 'POST',
              data: {type: user},
              success: function(data){
                //$("#d").html(data);
                $('#sdelete').modal('show');
                $('#qdelete').modal('hide');
                //alert(data);
                if (data ==""){
                  viewDetails();
                }
              }
            });

            
        
      }
      function dNo(){
        

        
        $('#qdelete').modal('hide');
      }

      function comp(){
        if (haha ==""){
          $('#error1').modal("show");
        }
        else{
          $('#complete').modal('show');
        }
      }

      function compYes(){
        var borrower = haha;
        $.ajax({

              url: "ajax/insert/return1.php",
              type: 'POST',
              data: {type: borrower},
              success: function(data){
                //$("#d").html(data);
                
                $('#complete').modal('hide');
                //alert(data);
                
                if (data == "error1"){
                  $("#error1").modal('show');
                }
                else if (data == "error2"){
                  $("#error2").modal('show');
                }
                else if (data == "error3"){
                  $("#error6").modal('show');
                }
                else if (data == "error7"){
                  $("#error7").modal('show');
                }
                else{
                  //viewDetails();
                  $("#transactcomp").modal('show');
                    $('#stud').val("");
                    $('#barc').val("");
                    viewDetails1();
                    viewDetails();
                    $("#stud").prop('disabled', false);
                    window.open("ajax/reports/return.php?trans="+data);
                  }
              }
            });
      }
      function compNo(){
        $('#complete').modal('hide');
      }
      function ClearFields() {

     document.getElementById("stud").value = "";
     document.getElementById("barc").value = "";
     
}
    </script>

</body>
</html>
