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
<body onload="setLink('Search and Edit User')">
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
                    include_once('modals/contact.php');
                    include_once('modals/allfields.php');
                    include_once('modals/success.php');
                    include_once('modals/delete.php');
                    include_once('modals/update.php');
                    include_once('modals/ddelete.php');
                    include_once('modals/supdate.php');
                ?>



                <div class = "form-group">
                  <select class = "form-control" style="height:50px; width: 50%;" onchange="viewDetails(this.value)">
                    <option value = "0" hidden>Choose One</option>
                    <option value = "1">All Users</option>
                    <option value = "2">All Borrowers</option>
                    <option value = "3">Librarian</option>
                    <option value = "4">Student</option>
                    <option value = "5">Faculty</option>
                    <option value = "6">Alumni</option>
                  </select>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <!-- Advanced Tables -->
                        <div class="panel-heading" id = "heads" style="font-family:'MYRIAD PRO REGULAR';">
                              Search & Edit User
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

            url: "ajax/view/edituser.php",
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
      //for modal viewing
      function viewuser(str, str1){
        consUserId = str;
        conType = str1;
        $.ajax({

            url: "ajax/view/edituser1.php",
            type: 'POST',
            data: {type: str, type1: str1},
            success: function(data){
              $("#c").html(data);
              $('#view').modal('show');
              //alert(data);
            }
          });
      }

      //for editting
      function edit(){
        $('#view').modal('hide');
        $.ajax({

            url: "ajax/view/edituser2.php",
            type: 'POST',
            data: {type: consUserId, type1: conType},
            success: function(data){
              $("#d").html(data);
              $('#edit').modal('show');
              //alert(data);
            }
          });
      }

      //for closing
      function closes(){
        viewuser(consUserId, conType);
        $('#edit').modal('hide');

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

      function save(){
        var str = document.getElementsByName('userid')[0].value;
        var fname = document.getElementsByName('fname')[0].value;
        var lname = document.getElementsByName('lname')[0].value;

        fname = fname.trim();
        lname = lname.trim();
        if (str.indexOf('000')!=-1){
          if (fname == "" || lname == ""){
            if (fname == "")
            {
              check(fname, '#fname');
            }
            if (lname == "")
            {
              check(lname, '#lname');
            }
            $('#allfields').modal('show');
          }
          else{
            $('#edit').modal('hide');
            $('#qupdate').modal('show');
          }


        }
        else{

          var borrowertype = document.getElementsByName('btype')[0].value;
          var address = document.getElementsByName('address')[0].value;


          var middilename = document.getElementsByName('middilename')[0].value;
          var email = document.getElementsByName('email')[0].value;


          borrowertype = borrowertype.trim();
          address = address.trim();


          middilename = middilename.trim();

          if (fname == "" || lname == "" || borrowertype == "" || address == "" ||  middilename == "" )
          {
            if (fname == "")
            {
              check(fname, '#fname');
            }
            if (lname == "")
            {
              check(lname, '#lname');
            }

            if (borrowertype == "")
            {
              check(borrowertype, '#btype');
            }
            if (address == "")
            {
              check(address, '#address');
            }

            if (middilename == "")
            {
              check(middilename, '#middilename');
            }
            $('#allfields').modal('show');
          }
          else{
            $('#edit').modal('hide');
            $('#qupdate').modal('show');
          }
        }

      }

      function yes(){
        //alert('try');
        var user = document.getElementsByName('userid')[0].value;
        var fname = document.getElementsByName('fname')[0].value;

        var lname = document.getElementsByName('lname')[0].value;

        fname = fname.trim();
        lname = lname.trim();
        if (user.substring(0, 3) == '000') {
        //ajax for editing
            $.ajax({

              url: "ajax/update/edituser.php",
              type: 'POST',
              data: {type: user, type1: fname, type2: lname, type3: '1'},
              success: function(data){
                //$("#d").html(data);
                $('#qupdate').modal('hide');
                $('#supdate').modal('show');
                //alert(data);
              }
            });
        } else {
          var borrowertype = document.getElementsByName('btype')[0].value;
          var address = document.getElementsByName('address')[0].value;

          var middilename = document.getElementsByName('middilename')[0].value;
          var email = document.getElementsByName('email')[0].value;
          console.log(email);

          borrowertype = borrowertype.trim();
          address = address.trim();


          middilename = middilename.trim();
          $.ajax({

              url: "ajax/update/edituser.php",
              type: 'POST',
              data: {
                'type': user,
                'type1': fname,
                'type2': lname,
                'type3': '2',
                'type4': borrowertype,
                'type5':address,
                'type6': middilename,
                'email': email
              },
              success: function(data){
                //$("#d").html(data);
                $('#qupdate').modal('hide');
                $('#supdate').modal('show');
                //alert(data);
              }
            });
        }
        viewDetails(typehaha);
        //alert(typehaha);
      }

      function no(){
        //alert('try');
        $('#edit').modal('show');
        $('#qupdate').modal('hide');
      }

      function del(){
        $('#view').modal('hide');
        $('#qdelete').modal('show');
      }

      function dYes(){
        var user = $("#useid").val();
        user = user;
        if (consUserId.indexOf('LIB') != -1){
          $.ajax({

              url: "ajax/delete/edituser.php",
              type: 'POST',
              data: {type: consUserId, type1: '1'},
              success: function(data){
                //$("#d").html(data);
                $('#sdelete').modal('show');
                $('#qdelete').modal('hide');
                $('#view').modal('hide');
                viewDetails(typehaha);
                //alert(data);
              }
            });
        }
        else{
          $.ajax({

              url: "ajax/delete/edituser.php",
              type: 'POST',
              data: {type: consUserId, type1: '2'},
              success: function(data){
                //$("#d").html(data);
                $('#sdelete').modal('show');
                $('#qdelete').modal('hide');
                $('#view').modal('hide');
                viewDetails(typehaha);
                //alert(data);
              }
            });
        }
        viewDetails(typehaha);


      }
      function dNo(){


        $('#view').modal('show');
        $('#qdelete').modal('hide');
      }


    </script>

</body>
</html>
