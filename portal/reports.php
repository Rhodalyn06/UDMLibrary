<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <?php
    include_once('ajax/session.php');
    include_once('ajax/logout.php');

    include 'includes/style.php'
  ?>
</head>
<body onload="setLink('Reports')">
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
               <div class = "form-group">
                <label>Report Type</label>
                <select class = "form-control" style="height:50px;" id = "type">
                  <option value = "bookinventory">Book Inventory</option>
                  <option value = "unborrowedbooks">List of Unborrowed Books</option>
                  <option value = "newlyacquiredbooks">List of Newly Acquired Books</option>
                  <option value = "outdatedbooks">List of outdated books</option>
                  <option value = "borrowedbooks">List of borrowed books</option>
                  <option value = "returnedbooks">List of returned books</option>
                  <option value = "unreturnedbooks">List of unreturned books</option>
                  <option value = "penalties">List of Penalties Paid</option>
                  <option value = "oveduebooks">List of overdue books</option>
                  <option value = "lostdamagebooks">List of lost/damaged books</option>
                  <option value = "userlogs">User Logs</option>
                  <option value = "reservedbooks">List of Reserved Books</option>
                  <option value = "userlogs">List of userlogs</option>
                  <option value = "systemusers">List of system users</option>
                </select>
                <label>From</label>
                <input type = "date" class="form-control" id = "from"/>
                <label>To</label>
                <input type = "date" class = "form-control" id = "to"/><br/>
                <div class="row">
                <div class="col-md-6">
                <button class = "btn btn-default btn-block" onclick="generate()">Generate</button>
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
    <script type="text/javascript">
      function generate(){
        var type = $("#type").val();
        var froms = $("#from").val();
        var to = $("#to").val();
        //alert(to);
        window.open("ajax/reports/"+type+".php?from="+froms+"&to="+to);
      }
    </script>

    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
