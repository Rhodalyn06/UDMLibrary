<?php session_start() ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Universidad de Manila</title>
    <link rel="shortcut icon" href="images/udm.jpg">
    <meta name="author" content="Ralph Juniosa { Bored Developers } ">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='assets/css/fonts.css' rel='stylesheet' type='text/css' />
   <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />


</head>
<body>
    <div id="wrapper">
        <nav  class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="panel-body">
                            <ul class="nav nav-pills">
                                <!--<li onclick="set('home')" class="active"><a href="#home" data-toggle="tab">Home</a>
                                </li>-->
                                <li onclick="set('lib')" class=""><a href="#lib" data-toggle="tab">Librarian's Portal</a>
                                </li>
                                <li onclick="set('borrower')" class=""><a href="#admin" data-toggle="tab">Borrower's Portal</a>
                                </li>
                            </ul>


            </div>
        </nav>
    </div>


                <div class="col-md-12">
                    <div class="col-md-12">
                     <div class="panel-body">

                            <div class="tab-content">
                                <div class="tab-pane active" id="home">

                                    <!-- <img src="images/udm3.png"  width="100%" height="500px;" style="margin-top:50px;border-radius:15px;"> -->

                                <h1 style="color:#fff;text-align:center;margin-top:200px;"> Welcome  </h1>

                                </div>



                            <div class="tab-pane fade" id="lib">
                                    <div id="login-page">
                                        <div class="container">

                                            <div class="form-login">

                                            <img src="images/udm.jpg" class="img-responsive" alt="UDM LOGO" style="margin-left:20px;width:90%;padding-top:10px;"/>


                                                <div class="login-wrap">

                                                    <div class = "form-group" id = "xx">
                                                        <label>Username:</label>

                                                        <input type="text" class="form-control" placeholder="User ID" id = "luser"
                                                        onpaste="return: false;" autofocus oninput="val('#luser')" onblur="check('#xx', '#luser')">

                                                    </div>
                                                    <div class = "form-group" id = "xx1">
                                                    <label>Password:</label>
                                                        <input type="password" class="form-control" id = "lpass" onblur="check('#xx1', '#lpass')"
                                                        onpaste="return: false;" placeholder="Password" oninput="val('#lpass')">
                                                    </div>
                                                        <!--<label class="checkbox">
                                                            <span class="pull-right">
                                                                <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>

                                                            </span>
                                                        </label>-->
                                                    <br/>
                                                    <span id = "notif">
                                                    </span>
                                                    <br/>
                                                    <button class="btn btn-theme btn-block" onclick="libLog()"><i class="fa fa-sign-in"></i> LOG IN</button>




                                                </div>

                                            </div>

                                        </div>
                                      </div>

                                </div>



                                <div class="tab-pane fade" id="admin">

                                    <div class="form-login">
                                    <img src="images/udm.jpg" class="img-responsive" alt="UDM LOGO" width="300" style="margin-left:20px;width:90%;padding-top:10px;">

                                                <div class="login-wrap">

                                                    <div class = "form-group" id = "xx">
                                                     <label>Username:</label>
                                                        <input type="text" class="form-control" placeholder="User ID" id = "xluser"
                                                        onpaste="return: false;" autofocus oninput="val('#luser')" onblur="check('#xx', '#luser')">
                                                    </div>
                                                    <div class = "form-group" id = "xx1">
                                                    <label>Password:</label>
                                                        <input type="password" class="form-control" id = "xlpass" onblur="check('#xx1', '#lpass')"
                                                        onpaste="return: false;" placeholder="Password" oninput="val('#lpass')">
                                                    </div>
                                                        <!--<label class="checkbox">
                                                            <span class="pull-right">
                                                                <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>

                                                            </span>
                                                        </label>-->
                                                    <br/>
                                                    <span id = "notif">
                                                    </span>
                                                    <br/>
                                                    <button class="btn btn-theme btn-block" onclick="borLog()"><i class="fa fa-sign-in"></i> LOG IN</button>

                                                </div>
                                            </div>
                                </div>


                                <!-- OPAC TAB -->
                                <div class="tab-pane fade" id="opac">
                                    <div class = "col-xs-12 row" style = "background: #fff; padding: 12px;">
                                        <div class = "form-group">
                                      <div class="form-login">
                                                <h2 class="form-login-heading">LOG IN</h2>
                                                <div class="login-wrap">


                                                        <input type="text" class="form-control" placeholder="User ID" id = "xluser"
                                                        onpaste="return: false;" autofocus oninput="val('#luser')" onblur="check('#xx', '#luser')">
                                                    </div>
                                                        <!--<label class="checkbox">
                                                            <span class="pull-right">
                                                                <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>

                                                            </span>
                                                        </label>-->
                                                    <br/>
                                                    <span id = "notif">
                                                    </span>
                                                    <br/>
                                                    <button class="btn btn-theme btn-block" onclick="borLog()"><i class="fa fa-sign-in"></i> LOG IN</button>



                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /OPAC -->
                            </div>
                        </div>

                    </div>
                </div>

                <?php
                    include_once('portal/modals/fail.php');
                    include_once('portal/modals/allfields.php');
                ?>
                 <!-- /. ROW  -->

         <!-- /. PAGE WRAPPER  -->

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>



    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/imagescript.js"></script>
    <script>
             $.backstretch("assets/img/udm4.jpg", {speed: 500});
        function set(str){
           if (str == "lib"){
                $.backstretch("assets/img/2.jpg", {speed: 500});
            }
            else if (str == "borrower"){
                $.backstretch("assets/img/4.jpg", {speed: 500});
            }
            else if (str == "opac"){
                $.backstretch("assets/img/4.jpg", {speed: 500});
            }
        }
    </script>

    <script type="text/javascript">
        function libLog(){
            var user = $('#luser').val();
            var pass = $('#lpass').val();

            user=user.trim();
            pass=pass.trim();

            if (user == "" || pass == ""){
                $('#allfields').modal('show');
                check('#xx', user);
                check('#xx1', pass);

            }
            else{
                $.ajax({

                  url: "logincheck.php",
                  type: 'POST',
                  data: {type: user, type1: pass, type2: '1'},
                  success: function(data){
                    //$("#d").html(data);
                    //$('#qupdate').modal('hide');
                    //$('#supdate').modal('show');
                    //alert(data);
                    if (data=="fail"){
                        $('#fail').modal('show');
                    }
                    else{
                        window.location.href = "portal/"
                    }
                  }
                });
            }
        }

        function borLog(){
            var user = $('#xluser').val();
            var pass = $('#xlpass').val();

            user=user.trim();
            pass=pass.trim();

            if (user == "" || pass == ""){
                $('#allfields').modal('show');
                check('#xx', user);
                check('#xx1', pass);

            }
            else{
                $.ajax({

                  url: "logincheck1.php",
                  type: 'POST',
                  data: {type: user, type1: pass, type2: '2'},
                  success: function(data){
                    //$("#d").html(data);
                    //$('#qupdate').modal('hide');
                    //$('#supdate').modal('show');
                    //alert(data);
                    if (data=="fail"){
                        $('#fail').modal('show');
                    }
                    else{
                        window.location.href = "borrower/"
                    }
                  }
                });
            }
        }

        function check(str, str1){
            var model = $(str1).val();
            model = model.trim();
            $(str1).val(model);
            //alert('try');
            if (model == ""){
                //alert(str);
                $(str).addClass("has-error");
                $(str).removeClass("has-success");
            }
            else{
                $(str).addClass("has-success");
                $(str).removeClass("has-error");
            }

        }
        function val(str){
            var model = $(str).val();
            var len = model.length-1;
            var ver = model.charAt(len);

            if (/[abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789., ]/.test(ver)){

            }
            else{
                if (ver == "-"){

                }
                else{
                    ver = model.substr(len, 1);
                model = model.replace(ver, "");
                $(str).val(model);
                }
            }
        }


    </script>

    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
</body>
</html>


