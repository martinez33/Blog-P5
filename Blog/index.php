<?php

require './vendor/autoload.php';

use Config\Router;

//die($_GET['url']);

$routeur = new Router();
$routeur->routerRequete();




//-------------------------------



/*$ctrlHome = new App\Controler\HomeControler();
$ctrlBlog = new App\Controler\BlogControler();

$router = new Router($_GET['url']); 
$router->get('/', $ctrlHome->listHomePosts()); 
$router->get('/home', $ctrlHome->listHomePosts()); 
$router->get('/posts', $ctrlBlog->listPosts());*/ 
//$router->get('/posts/:id', function($id){ echo "Voila l'article $id"; }); 
//$router->run();*/

