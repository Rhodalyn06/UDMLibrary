<?php
    include_once('ajax/session.php');
    $module = $_SESSION['module'];
?>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
	    <li class="text-center">
            <img src="assets/img/udm.jpg" class="user-image img-responsive"/>
		</li>
				
				
        <li>
            <a class="" id="opac" href="opac.php"><i class="fa fa-search fa-3x"></i>OPAC</a>
        </li>

     
        <li>
            <a class="" id="reserve" href="reservation.php"><i class="fa fa-bookmark fa-3x"></i> Reserve Books</a>
        </li>   
        
         <li>
            <a class="" id="vreserve" href="reservationlog.php"><i class="fa fa-list-ul fa-3x"></i> View Reserve Books</a>
        </li>

        <li>
            <a class="" id="vborrowlog" href="borrowinglog.php"><i class="fa fa-folder-open fa-3x"></i> View Borrowed Books</a>
        </li>
        <li>
            <a class="" id="vborrow" href="unreturn.php"><i class="fa fa-mail-forward fa-3x"></i> View Unreturned Books</a>
        </li>	
      	

              
        <li>
            <a class="" id="passwords" href="password.php"><i class="fa fa-print fa-3x"></i> Change Password</a>
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
        
        else if (str == "View Borrowing Log"){
            $('#vborrowlog').addClass("active-menu");
        }
        else if(str == "View Unreturned Books"){
            $('#vborrow').addClass("active-menu");
        }
        else if (str == "View Reservation Log"){
            $('#vreserve').addClass("active-menu");
        }
        else if (str == "Reserve Books"){
            $('#reserve').addClass("active-menu");
        }
        else if (str == "Online Opac"){
            $('#opac').addClass("active-menu");
        }else if (str == "Change Password"){
            $('#passwords').addClass("active-menu");
        }
            str = str.toUpperCase();
        $("#n").html(str);
    }
</script>