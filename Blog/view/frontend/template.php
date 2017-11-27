<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
		
		 
		<title><?= $title ?></title>

		<style type="text/css">
		    body {
		      	 background-color:#DDD;  }
		    div .news {
		     	border: 3px #404f60 groove;}
		    p {
		     	font-size: 18px; margin-top: 10px; text-align: center; }
		    h1 {
		      	text-align: center;
		      	padding-top: 80px; }
		    div p{
		      	margin-left: 30px; }
		    div h3{
		      	margin-left: 8px; }

		    .navbar{

		    }
		       
		</style>
		    
	</head>


	<body>
		
	<div class="container">
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php">Forestier Martin</a>
					</div>
					<div class="navbar-collapse collapse ">
						<ul class="nav navbar-nav navbar-right">
							<li> <a href="#">Home</a> </li>
							<li> <a href="#">Blog</a> </li>
							<li> <a href="#">Contact</a> </li>
						</ul>
							    
					</div>
				</div>
			</div>		
	</div>
			


		
			
      		<div class="container">
      			<div class="row">
					<?= $content ?>
				</div>
			</div>

			


    	
	</body>


</html>

