<!DOCTYPE html>
	<html>
    	<head>
		    <meta charset="utf-8">
		    <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet">
		    <title><?= $title ?></title>

		    <style type="text/css">
		      	body {
		      	 	background-color:#DDD;  }
		     	div .news {
		     		border: 3px #404f60 groove;}
		     	p {
		     		font-size: 18px; margin-top: 10px; text-align: center; }
		      	h2 {
		      		text-align: center; }
		      	div p{
		      		margin-left: 30px; }
		      	div h3{
		      		margin-left: 8px; }
		       
		    </style>
		</head>

	<body>
		<div class="container">
			<?= $content ?>
		</div>
		
	</body>
</html>