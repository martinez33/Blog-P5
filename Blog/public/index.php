<?php 
ini_set('display_errors',1);

require './../vendor/autoload.php';

use Core\Routers\Router;



$router = new Router();

$router->handleUrl($_SERVER['REQUEST_URI']); // www.martin.fr/posts  URI = /posts










