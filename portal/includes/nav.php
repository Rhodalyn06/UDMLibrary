<?php
    include_once('ajax/session.php');

    include 'includes/style.php';
    $module = $_SESSION['module'];
?>



<nav class="navbar navbar-default navbar-side" role="navigation">

    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
        
	    <li class="text-center">
        <img src="assets/img/udm.jpg" class="user-image img-responsive"/>
		</li>
        <!--
      <li>
            <a class="" id="index" href ="index.php">
            <i class="fa fa-dashboard fa-3x"></i> Home</a>
        </li>
        -->
        <li>
           <a id="user" href="#"><i class="fa fa-user fa-3x"></i> User Management
            <span class="fa arrow"></span></a>
            <ul class="nav nav-first-level" id="nuser">
  
                <li>
                    <a class="" id="adduser" href="adduser.php"> * Add User</a>
                </li>

                <!--
                   <li>
                    <a class="" id="adduser" href="addlibrarian.php">Add Lib</a>
                </li>-->
                <li>
                    <a class=""  id="edituser" href="edituser.php"> * Search and Edit</a>
                 <!--   
                </li>
                      <li>
                    <a class="" id="addcateg" href="addposition.php">Add New Position</a>
                </li>
                -->
                <!--
                <li>
                    <a class=""  id="deleteuser" href="manageuser.php">Manage Deleted Users</a>
                </li>
                -->
                <li>
                    <a class="" id="password" href="password.php"> * Change Password</a>
                </li>
            </ul>
        </li>
        <li>
            <a id="book" href="#"><i class="fa fa-book fa-3x"></i> Book Management
            <span class="fa arrow"></span></a>
            <ul class="nav nav-first-level collapse" id="nbook">
                                <li>
                    <a class="" id="addbook" href="addbook.php"> * Add Book</a>
                </li>
                <!--
                <li>
                    <a class="" id="addcateg" href="addcateg.php">Add New Category</a>
                </li>
                -->
                <li>
                    <a class="" id="editbook" href="editbook.php"> * Search and Update Book</a>
                </li>
                
                <li>
                    <a class="" id="unreturned" href="unreturned.php"> * Unreturned Books</a>
                </li>
                
                <!--<li>
                    <a class="" id="deletebook" href="managebook.php">Manage Deleted Book</a>
                </li>-->
            </ul>
        </li>

        <li>
            <a id="holiday" href="#"><i class="fa fa-book fa-3x"></i> Holiday Management
            <span class="fa arrow"></span></a>
            <ul class="nav nav-first-level collapse" id="nholiday">
                <li>
                    <a class="" id="addholiday" href="addsuspension.php"> * Add Suspension</a>
                </li>
                <li>
                    <a class="" id="editholiday" href="editsuspension.php"> * Search Suspension & Event</a>
                </li>
                <!--<li>
                    <a class="" id="deletebook" href="managebook.php">Manage Deleted Book</a>
                </li>-->
            </ul>
        </li>
        <li>
            <a class="" id="borrow" href="borrow.php"><i class="fa fa-mail-forward fa-3x"></i> Borrow</a>
        </li>               
        <li>
            <a class="" id="return" href="return.php"><i class="fa fa-mail-reply fa-3x"></i> Return</a>
        </li>
         <li>
            <a class="" id="penalty" href="penalty.php"><img class="responsive" src="./img/changepenalty.png" style="width:20%"; height="auto;"> Change Penalty Price</a>
        </li>
        <li>
            <a class="" id="reserve" href="reservation.php"><img class="responsive" src="./img/Reservation.png" style="width:20%"; height="auto;">  Manage Reservations</a>
        </li>
    
         <li>
            <a class="" id="userlogs" href="userlogs.php"><img class="responsive" src="./img/userlog.png" style="width:20%"; height="auto;">  User Logs</a>
        </li>
        
      <li>
            <a class="" id="reports" href="reports.php"><i class="fa fa-print fa-3x"></i> Reports</a>
        </li>   
     
    </ul>
               
</div>
            
</nav>


<script type="text/javascript">
    //setLink(old, old1);

    function setLink(str){
        $.ajax({

            url: "ajax/insert/module.php",
            type: 'POST',
            data: {type: str},
            success: function(data){
            //$("#d").html(data);

            //alert(data);
            }
        });
        //alert('try');
        /*$('#index').removeClass("active-menu");
        $('#adduser').removeClass("active-menu");
        $('#edituser').removeClass("active-menu");
        $('#deleteuser').removeClass("active-menu");
        $('#addbook').removeClass("active-menu");
        $('#editbook').removeClass("active-menu");
        $('#deletebook').removeClass("active-menu");
        $('#borrow').removeClass("active-menu");
        $('#return').removeClass("active-menu");
        $('#reports').removeClass("active-menu");*/
        if (str == "Home"){
            $('#index').addClass("active-menu");
        }
        else if (str == "Add User"){
            $('#user').addClass("active-menu");
            $('#nuser').addClass("navbar-collapse");
            $('#adduser').addClass("active-menu");
        }
        else if (str == "Manage Deleted User"){
            $('#nuser').addClass("navbar-collapse");
            $('#user').addClass("active-menu");
            $('#deleteuser').addClass("active-menu");
        }
        else if (str == "Search and Edit User"){
            $('#nuser').addClass("navbar-collapse");
            $('#user').addClass("active-menu");
            $('#edituser').addClass("active-menu");
        }
        else if (str == "Add Book") {
            $('#nbook').addClass("navbar-collapse");
            $('#book').addClass("active-menu");
            $('#addbook').addClass("active-menu");
        }
        else if (str == "Add Book Category"){
            $('#nbook').addClass("navbar-collapse");
            $('#book').addClass("active-menu");
            $('#addcateg').addClass("active-menu");
        }
        else if (str == "Search and Edit Book"){

            $('#nbook').addClass("navbar-collapse");
            $('#book').addClass("active-menu");
            $('#editbook').addClass("active-menu");
        }
        else if (str == "Manage Deleted Book"){

            $('#nbook').addClass("navbar-collapse");
            $('#book').addClass("active-menu");
            $('#deletebook').addClass("active-menu");
        }
        else if (str == "Return"){
            $('#return').addClass("active-menu");
        }
        else if(str == "Borrow"){
            $('#borrow').addClass("active-menu");
        }
        else if (str == "Reports"){
            $('#reports').addClass("active-menu");
        }
        else if (str == "Reserve"){
            $('#reserve').addClass("active-menu");
        }
        else if (str == "View User Logs"){
            $('#userlogs').addClass("active-menu");
        }

        else if (str == "Change Password"){
            $('#nuser').addClass("navbar-collapse");
            $('#user').addClass("active-menu");
            $('#password').addClass("active-menu");
        }
        else if (str == "Manage Suspension"){
            $('#holiday').addClass("active-menu");
        }
        else if (str == "Add Supension") {
            $('#nholiday').addClass("navbar-collapse");
            $('#holiday').addClass("active-menu");
            $('#addholiday').addClass("active-menu");
        }
        else if (str == "Search and Edit Suspension"){

            $('#nholiday').addClass("navbar-collapse");
            $('#holiday').addClass("active-menu");
            $('#editholiday').addClass("active-menu");
        }
        else if (str == "View Unreturned Books"){

            $('#nbook').addClass("navbar-collapse");
            $('#book').addClass("active-menu");
            $('#unreturned').addClass("active-menu");
        }
        else if (str == "Change Penalty Price"){
            $('#penalty').addClass("active-menu");
        }
        str = str.toUpperCase();
        str = str.bold();
        $("#n").html(str);
    }</script>