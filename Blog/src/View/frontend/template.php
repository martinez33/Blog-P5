<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

    
        <title>

            <?= $title; ?>
            
        </title>

        <!-- Bootstrap core CSS -->
        <base href="/"--> <!--base de recherche pour rewriting-->
        <link href="startbootstrap-clean-blog/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="startbootstrap-clean-blog/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="startbootstrap-clean-blog/css/clean-blog.min.css" rel="stylesheet">

        <script src="startbootstrap-clean-blog/js/jquery-3.2.1.js"></script>
        <script src="startbootstrap-clean-blog/js/bootstrap.min.js"></script>

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">

            <div class="container">

                <a class="navbar-brand" href="/">Martin Forestier</a>

                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  Menu
                  <i class="fa fa-bars"></i>

                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">

                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">

                            <a class="nav-link" href="/">Home</a> 

                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="/posts">Posts</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="/contact">Contact</a>

                        </li>

                    </ul>

                </div>

            </div>

        </nav>

        <!-- Page Header -->
        <header class="masthead" style="background-image: url('startbootstrap-clean-blog/img/home-bg.jpg')">

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
			
        <div class="container" >
      
			      <?= $content; ?>
		  
        </div>

        <!-- footer -->
        <footer>

            <div id="Competences" class="text-center footer">

                <div class="container-fluid">


                    <hr />

                    <div class="section-title center">

                        <h2 style="border-bottom: 1px solid black; border-top: 1px solid black; text-align: center">Mes compétences</h2>

                        <div class="line">

                            <hr />

                        </div>

                    </div>

                    <div class="space"></div>

                    <div class="row logos">

                        <div class="col-lg-4 col-sm-6 ">

                            <img src="images/iconDev.png" alt="">

                            <h4>Développement Web</h4>

                            <p>PHP, CSS/HTML, SQL, C</p>

                        </div> 

                        <div class="col-lg-4 col-sm-6 ">

                            <img src="images/iconWeb.png" alt="">

                            <h4>Responsive Design</h4>

                            <p>Bootstrap</p>

                        </div>

                        <div class="col-lg-4 col-sm-6 ">

                            <a href="/contact"><img src="images/iconMail.png" alt=""></a>

                            <a href="/contact"><h4>Me contacter</h4></a>

                            <a href="/contact"><p>Via le formulaire</p></a>

                        </div>

                    </div>

                </div>

            </div>

        </footer>

	  </body>

</html>

