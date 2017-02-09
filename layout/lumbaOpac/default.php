<!DOCTYPE html>
<html lang="en">
<?php
    include 'connection.php';
?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Online OPAC</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body onload = "view()">
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="default.php" class="logo">Online<span class="lite">Opac</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="">
                      <a class="" href="default.php">
                          <i class="icon_house_alt"></i>
                          <span>Online Opac</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-table"></i>Online Opac</h3>
					
				</div>
			</div>
              <!-- page start-->
                
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Books
                          </header>
                          <div class="table-responsive">
                          <!-- SEARCH -->
                          <br/>
                            <div align = "center">
                    <table>
                        <tr>
                            <td>
                                <select name = "type1" class = "form-control">                                    
                                    <option value = "name"> Title </option>
                                    <option value = "aname">Author</option>
                                    <option value = "yearPublished">Year Published </option>                                                                 
                                    <option value = "statusOfBook">Status</option>
                                </select>
                            </td>
                            <td style="visibility:hidden;">spa</td>
                            <td><input type = "text" class = "form-control" maxlength="50" name = "txt1"></td>
                            <td style="visibility:hidden;">spa</td>
                            <td>
                                <select name = "opt1" class = "form-control">
                                    <option value = "and"> And </option>
                                    <option value = "or"> Or </option>
                                    <option value = "and not"> Not </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name = "type2" class = "form-control">                                    
                                    <option value = "name"> Title </option>
                                    <option value = "aname">Author</option>
                                    <option value = "yearPublished">Year Published </option>                                   
                                    <option value = "statusOfBook">Status</option>
                                </select>
                            </td>
                            <td style="visibility:hidden;">spa</td>
                            <td><input type = "text" class = "form-control" maxlength="50" name = "txt2"></td>
                            <td style="visibility:hidden;">spa</td>
                            <td>
                                <select name = "opt2" class = "form-control">
                                    <option value = "and"> And </option>
                                    <option value = "or"> Or </option>
                                    <option value = "and not"> Not </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name = "type3" class = "form-control">                                    
                                    <option value = "name"> Title </option>
                                    <option value = "aname">Author</option>
                                    <option value = "yearPublished">Year Published </option>                                                                      
                                    <option value = "statusOfBook">Status</option>
                                </select>
                            </td>
                            <td style="visibility:hidden;">spa</td>
                            <td><input type = "text" class = "form-control" maxlength="50" name = "txt3"></td>
                            <td style="visibility:hidden;">spa</td>
                            <td>
                                <button class = "btn btn-primary" onclick = "view()">SEARCH</button>
                            </td>
                        </tr>
                    </table><br/><br/>
                </div>
                          <!-- END SEARCH -->

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                              <thead>
                                <tr>               
									
                                  <th>Call Number</th>
                                  <th>Title</th>
                                  <th>Author</th>
                                 
                                  <th>Year Published</th>           
									
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody id = "content">
                              </tbody>
                            </table>
                          </div>

                      </section>
                  </div>
              </div>
              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->

  <!-- AJAX -->
  <script>
    function view(){
        var txt1 = document.getElementsByName('txt1')[0].value;
        var txt2 = document.getElementsByName('txt2')[0].value;
        var txt3 = document.getElementsByName('txt3')[0].value;
        var type1 = document.getElementsByName('type1')[0].value;
        var type2 = document.getElementsByName('type2')[0].value;
        var type3 = document.getElementsByName('type3')[0].value;
        var opt1 = document.getElementsByName('opt1')[0].value;
        var opt2 = document.getElementsByName('opt2')[0].value;

        if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
               
                
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

            xmlhttp.onreadystatechange = function() {
                //alert(xmlhttp.readState + " " + xmlhttp.status);
                if (xmlhttp.readyState == 4 && xmlhttp.status==200) {

                   document.getElementById('content').innerHTML = xmlhttp.responseText;
                    
                }
            }
            xmlhttp.open("GET","ajax.php?f="+txt1+"&g="+txt2+"&h="+txt3+"&i="+type1+"&j="+type2+"&k="+type3+"&l="+opt1+"&m="+opt2,true);
            xmlhttp.send();
    }
  </script>
  <!-- END AJAX -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nicescroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>

  </body>
</html>
