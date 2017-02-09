<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
    include_once('ajax/session.php');
    include_once('ajax/logout.php');

        include 'includes/style.php'
    ?>
</head>
<body onload="setLink('Online Opac')">
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
                        <div class = "col-md-12">



                          
                        </div>
                                                <div class = "col-md-4">
                                                    <select class = "form-control" style="height:45px;"  id = "select1">
                                                        <option value="1">Title</option>
                                                        <option value = "2">Author</option>
                                                        <option value = "3">Edition</option>
                                                    </select>
                                                </div>
                                                <div class = "col-md-4">
                                                    <input class="form-control" id = "txt1"/>
                                                </div>
                        <div class = "col-md-4">
                                                    <select class = "form-control" style="height:45px;"   id ="opt1">
                                                        <option value="and">And</option>
                                                        <option value = "or">or</option>
                                                        <option value = "!">not</option>
                                                    </select>
                                                </div>
                                            </div><br/>
                                            <div class="row">
                                                <div class = "col-md-4">
                                                    <select class = "form-control" style="height:45px;"  id ="select3">
                                                        <option value="1">Title</option>
                                                        <option value = "2">Author</option>
                                                        <option value = "3">Edition</option>
                                                    </select>
                                                </div>
                                                <div class = "col-md-4">
                                                    <input class="form-control" id ="txt3"/>
                                                </div>
                                                <div class = "col-md-4">
                                                    <button class = "btn btn-success btn-block" onclick="viewDetails()"> SEARCH <span class="glyphicon glyphicon-search"></span></option>
                                                </div>
                                            </div>
                                        <br/><br/>
                                        <!-- Advanced Tables -->
                                  
         

        <div class="row">
                  <div class="col-md-12">
                    <!-- Advanced Tables -->
                    
                        <div class="panel-heading">
                       OPAC
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tblBook">
                                                        <thead>
                                                      
                                                            <th>
                                                              Title
                                                            </th>
                                                            <th>
                                                              Author
                                                            </th>
                                                            <th>
                                                              Edition
                                                            </th>
                                                            <th>
                                                              Category
                                                            </th>
                                                              <th>
                                                              Location
                                                            </th>
                                                            <th>
                                                              Status
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
        var txt1 = $('#txt1').val().trim();
        var txt3 = $('#txt3').val().trim();
        var select1 = $('#select1').val();
        var select3 = $('#select3').val();
    var opt1 = $('#opt1').val();
    var opt2 = $('#opt2').val();

    
        $.ajax({

            url: "ajax/view/opac.php",
            type: 'POST',
            data: {txt1: txt1, txt3: txt3, select1: select1, select3: select3, opt1: opt1},
            success: function(data){
              
              $("#f").html(data);
              $('#tblBook').dataTable();
              //alert(data);
            }
          });

        
      }
   </script>
</body>
</html>
