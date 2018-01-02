<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <title><?= $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="public/startbootstrap-clean-blog/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="public/startbootstrap-clean-blog/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="public/startbootstrap-clean-blog/css/clean-blog.min.css" rel="stylesheet">
  
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php?action=home">Martin Forestier</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=blog">Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

     <!-- Page Header -->
    <header class="masthead" style="background-image: url('public/startbootstrap-clean-blog/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Mon blog</h1>
              <span class="subheading">Into the Dev...</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!--<div class="container">
  
      <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?action=home">Forestier Martin</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li> <a href="index.php?action=home">Home</a> </li>
              <li> <a href="index.php?action=blog">Blog</a> </li>
              <li> <a href="#">Contact</a> </li>
            </ul>
                  
          </div>
        </div>
      </div>   


    </div>-->


		
			
    <div class="container" >
      
			 <?= $content ?>
		  
    </div>



<!-- footer -->
  <footer>
    <div id="Competences" class="text-center footer">
      <div class="container-fluid">
      <hr />
        <div class="section-title center">
          <h2>Mes compétences</h2>
          <div class="line">
              <hr />
          </div>
        </div>
        <div class="space"></div>
        <div class="row logos">
          <div class="col-lg-3 col-sm-6 ">
            <img src="public/images/iconDev.png" alt="">
            <h4>Developpement Web</h4>
            <p>PHP</p>
          </div> 
          <div class="col-lg-3 col-sm-6 ">
            <img src="public/images/iconWeb.png" alt="">
            <h4>Responsive Design</h4>
            <p>Bootstrap</p>
          </div>
          <div class="col-lg-3 col-sm-6 ">
            <img src="public/images/iconWeb.png" alt="">
            <h4>Responsive Design</h4>
            <p>Bootstrap</p>
          </div>
          <div class="col-lg-3 col-sm-6 ">
            <img src="public/images/iconMail.png" alt="">
            <h4>Me contacter</h4>
            <p>Via le formulaire</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

	</body>

</html>

