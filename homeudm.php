
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Universidad De Manila">
    <link rel="shortcut icon" href="images/udm.jpg">
     <meta name="author" content="">
    

    <title>Universidad De Manila</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!--Login Page CSS-->
    <link href="assets/css/loginpage.css" rel="stylesheet">

    <!-- Fonts CSS -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
 <style>

 .msgError {

    color:lightgreen;
  font-size: 20px;
  font-family: Roboto;}
 }


 </style>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- This is better For mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand" href="homepage.html">Universidad De Manila </a>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <form class="navbar-form nav navbar-nav navbar-right" action="" method="post">
            
            <a type="btn btn-primary btn-lg btn-block" href="index.php" class="btn btn-success">Sign in </a>
            
          </form>
   
        </div>
            </div>
           
        </div>
        
    </nav>

    <!-- Bootstrap Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Caro Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Bootstrap Images slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('images/udm1.jpg');"></div>
             
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('images/udm2.jpg');"></div>
             
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('images/udm4.jpg');"></div>
          
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="Wc">
                   Universidad De Manila
                </h1>
            </div>
        </div>

          <div class="container marketing">

        <div class="row">
        <div class="col-lg-4">
         
          <h2 style="text-align:center;">Mission:</h2>
          <p>It is the commitment of the University to provide a spectrum of educational opportunities to instill our students the motivation and develop in them the basic skills for lifetime learning in an environment of dignity, diversity and change.</p>
        
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          
          <h2 style="text-align:center;">Vision:</h2>
          <p>A community-focused University that provides educational opportunities to each and every student in his own uniqueness as well as to the youths who are physically, mentally and emotionally healthy, skillful and productive morally and spiritually upright in a drug-free, healthy and peaceful community.</p>
     
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          
          <h2 style="text-align:center;">About us:</h2>
          <p>The main campus of UNIVERSIDAD DE MANILA, which houses the Administration Building of the Division of City Schools-Manila, is located at the heart of the Mehan Garden adjacent to the Liwasang Bonifacio, Manila City Library and the Light Rail Transit Central Terminal. Apart from its main campus, the university maintains several satellite centers in many parts of the City of Manila such as Escolta, Recto, Del Pan, San Andres, Dapitan and Tayuman.
The university’s original name is City College of Manila (CCM), but when Lito Atienza took office as Mayor the name was changed to UNIVERSIDAD DE MANILA (UDM). In 2007, when Lim was re-elected as Mayor, he reverted UDM to its original name; however, a few months into office, he renamed it Gat Andrés Bonifacio University.
The founder of the university, Mayor Alfredo Lim, said that the “egalitarian UDM complements the elite PLM. For its part, the City College delivers practical education to average student.
</p>
        
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

</div>
        
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="footer">
                    <p>Copyright &copy; 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //Changes the speed
    })
    </script>

</body>

</html>
