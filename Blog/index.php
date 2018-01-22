<?php

require './vendor/autoload.php';

use Core\Routers\Router;



$router = new Router();
//var_dump($_SERVER['REQUEST_URI']);
//$router->match($_SERVER['REQUEST_URI']);
$router->handleUrl($_SERVER['REQUEST_URI']); // www.martin.fr/posts  URI = /posts









//die($_GET['url']);

/*$routeur = new Router();
$routeur->routerRequete();*/




//-------------------------------

/*$router = new Router($_GET['url']); 

$ctrlHome = new App\Controler\HomeControler();
$ctrlBlog = new App\Controler\BlogControler();
$ctrlPost = new App\Controler\PostControler();*/

//$router->get('/', function(){ echo "Homepage"; });
//$router->get('/home', function(){ echo "Homepage"; });/*$ctrlBlog->listPosts()); */
//$router->get('/posts', function(){ echo "Tous les posts"; });
//$router->get('/home', $ctrlHome->ListHomePosts());/*$ctrlBlog->listPosts()); */
//$router->get('/posts', $ctrlBlog->listPosts());/*$ctrlBlog->listPosts()); */
/*$router->get('/posts/:id',function($id){ 
?>

	<form action="" method="post">
		<input type="text" name="name">
		<button type="submit">Envoyer</button>

	</form>
		


<?php 
 } );

$router->post('/posts/:id', function($id){ echo 'Poster pour l\'article' .$id. '<pre>'.print_r($_POST, true).'<pre>'; }); 

$router->run();*/

