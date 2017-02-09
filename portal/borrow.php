<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
    include_once('ajax/session.php');
    include_once('ajax/logout.php');

		include 'includes/style.php';
    include 'ajax/validate.html';

    include_once('ajax/connection.php');
    $sql = $conn->query("DELETE FROM temp_borrow");
	?>
</head>
<body onload="setLink('Borrow')">
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
                    include_once('modals/addcart.php');
                    include_once('modals/ddelete.php');
                    include_once('modals/supdate.php');
                    include_once('modals/bookadded.php');
                    include_once('modals/error1.php');
                    include_once('modals/error2.php');
                    include_once('modals/error3.php');
                    include_once('modals/error4.php');
                    include_once('modals/error5.php');
                    include_once('modals/complete.php');
                    include_once('modals/transactcomp.php');
                ?>

                
                <div class="row">
                  <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="form-group">
                      <label style="font-size:18px;">User ID: </label>
                      <input class="form-control" id="stud" style="width:40%;"><br/>
                      <button class="btn btn-default btn-block" style="width:20%;font-size:20px;" onclick="viewDetails()">View </button>
                    </div>
                    <div id ="z">
                    </div>
                  </div>


                  <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="form-group">
                      <label style="font-size:18px;">Barcode: </label>
                      <input class="form-control" id="barc" style="width:40%;"><br/>
                      <button class="btn btn-default btn-block" style="width:20%;font-size:20px;"  onclick="viewDetails1()">View </button>
                    </div>
                    <div id ="y">
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

      //for table viewing
      function viewDetails(){
        //alert('try');
        stud=$('#stud').val();
        $.ajax({
            
            url: "ajax/view/borrow.php",
            type: 'POST',
            data: {type: stud},
            success: function(data){
              $("#z").html(data);
              //alert(data);
            }
          });

        haha = stud;
      }

      function viewDetails1(){
        //alert('try');
        stud=$('#barc').val();
        $.ajax({
            
            url: "ajax/view/borrow1.php",
            type: 'POST',
            data: {type: stud},
            success: function(data){
              $("#y").html(data);
              //alert(data);
            }
          });

        
      }


      //for modal viewing
      function viewbook(str){
        id = str;
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

      //for editting
      function edit(){
        $('#view').modal('hide');
        $.ajax({

            url: "ajax/view/editbook3.php",
            type: 'POST',
            data: {type: id},
            success: function(data){
              $("#h").html(data);
              $('#editview').modal('show');
              //alert(data);
            }
          });
      }

      //for closing
      function closes(){
        
        $('#editview').modal('hide');
        $('#viewsub').modal('hide');
        viewbook(id);
      }

      //
      function check(str, str1){
        str = str.trim();
        if (str == ""){
          $(str1).addClass('has-error');
          $(str1).removeClass('has-success');
        }
        else{

          $(str1).addClass('has-success');
          $(str1).removeClass('has-error');
        }

        if (str1 == "#contactnum"){
          contactNum('lcontactnum');
        }
      }

      function save(str){
        //alert('try');
        $('#addcart').modal('show');
        xd=str;
      }

      function yes(){
        if (haha==""){
          $('#error1').modal('show');
        }
        else{
        $.ajax({

            url: "ajax/insert/borrow.php",
            type: 'POST',
            data: {type: xd, type1: haha},
            success: function(data){
              //$("#d").html(data);
              $('#addcart').modal('hide');
              if (data == "error1"){
                $('#error1').modal('show');
              }
              else if (data == "error2"){
                $('#error2').modal('show');
              }
              else if (data == "error3"){
                $('#error3').modal("show");
              }
              else if (data == "error5"){
                $('#error5').modal("show");
              }
              else if (data == "noerror"){
                $('#bookadded').modal('show');
                viewDetails();
                $('#barc').val("");
                viewDetails1();
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

              url: "ajax/insert/borrow1.php",
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
                  $("#error3").modal('show');
                }
                else if (data == "error4"){
                  $("#error4").modal('show');
                }
                else{
                  //viewDetails();
                  $("#transactcomp").modal('show');
                  $('#stud').val("");
                  $('#barc').val("");
                  viewDetails1();
                  viewDetails();

                  window.open("ajax/reports/borrow.php?trans="+data);
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
