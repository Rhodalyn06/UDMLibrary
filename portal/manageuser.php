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
<body onload="setLink('Manage Deleted User')">
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
                    //include_once('forms/edituser.php');
                    
                    include_once('modals/viewuser.php');

                    include_once('modals/edituser.php');
                    //alerts
                    include_once('modals/restore.php');
                    include_once('modals/qrestore.php');
                ?>
               
                <div class = "form-group">
                  <select class = "form-control" style="width: 50%;" onchange="viewDetails(this.value)">
                    <option value = "0" hidden>Choose One</option>
                    <option value = "1">All Users</option>
                    <option value = "2">All Borrowers</option>
                    <option value = "3">Librarian</option>
                    <option value = "4">Student</option>
                    <option value = "5">Faculty</option>
                  </select>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel">
                        <div class="panel-heading" id = "heads" style="font-family:'MYRIAD PRO REGULAR';">
                              Manage User
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tblUser">
                                    <thead>
                                      <tr>
                                        <td><strong>
                                          USERNAME
                                        </td></strong>
                                        <td><strong>
                                          FIRST NAME
                                        </td></strong>
                                        <td><strong>
                                          LAST NAME
                                        </td></strong>
                                        <td><strong>
                                          USER TYPE
                                        </td></strong>
                                      </tr>
                                    </thead>
                                    <tbody id = "b">
                                    </tbody>
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
      include_once('includes/scripts.php')
    ?>
    <script type="text/javascript">
      var consUserId = "";
      var conType = "";
      var typehaha = "";
      //for table viewing
      function viewDetails(str){
        typehaha = str;
        $.ajax({

            url: "ajax/view/manageuser.php",
            type: 'POST',
            data: {type: str},
            success: function(data){
              $("#b").html(data);
              $('#tblUser').dataTable();
              //alert(data);
            }
          });

        if (str == "1"){
          $('#heads').html('All Users');
        }
        else if (str == "2"){
          $('#heads').html('All Borrowers');
        }
        else if (str == "3"){
          $('#heads').html('Librarians');
        }
        else if (str == "4"){
          $('#heads').html('Students');
        }
        else if (str == "5"){
          $('#heads').html('Faculty');
        }
      }

      function viewuser(str, str1){
        conType=str1;
        consUserId=str;
        $('#qres').modal('show');
      }

      function dYes(){
        var user = consUserId;

        if (user.indexOf('LIB')!=-1){
          $.ajax({

              url: "ajax/restore/manageuser.php",
              type: 'POST',
              data: {type: user, type1: '1'},
              success: function(data){
                //$("#d").html(data);
                $('#sres').modal('show');
                $('#qres').modal('hide');
                //alert(data);
              }
            });
        }
        else{
          $.ajax({

              url: "ajax/restore/manageuser.php",
              type: 'POST',
              data: {type: user, type1: '2'},
              success: function(data){
                //$("#d").html(data);
                $('#sres').modal('show');
                $('#qres').modal('hide');
                //alert(data);
              }
            });
        }
        viewDetails(typehaha);

        
      }
      function dNo(){
      
        $('#qres').modal('hide');
      }

      
    </script>

</body>
</html>
