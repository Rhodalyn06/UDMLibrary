<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                    
                 
             
            </div>


<div style="color: black; padding: 15px 50px 5px 50px; float: right;font-size: 20px;">
<label style="font-size:20px;">Welcome&nbsp;</label>
 <?php
    echo $_SESSION['type'];
  ?>
<label style="font-size:20px;margin-left:10px;">Today is: </label>
<?php
    echo date("Y M d");
?>
 &nbsp;

   

 
 </nav>