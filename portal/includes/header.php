<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                    
                 
             
            </div>


<div style="color: black; margin-top: 10px;margin-right: 30px; float: right;font-size: 20px;">
<label style="font-size:20px;">Welcome </label>
                    <?php
                        echo $_SESSION['type'];
                    ?>
            <label style="font-size:20px;margin-left:10px">Today is:</label>
                        <label style="font-size:20px;margin-left:10px;color:#649173;">                                
                                <?php
                                $Today = date('y:m:d');
                                $new = date('l, F d, Y', strtotime($Today));
                                echo $new;
                                ?>
                                </label>  &nbsp; &nbsp;
                                <a href="ajax/logouts.php"><i class="fa fa-sign-out fa-1x"></i>Logout</a>
</div>

 </nav>