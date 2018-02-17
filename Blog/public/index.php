<?php 

require './../vendor/autoload.php';


use Core\Routers\Router;


$router = new Router();

$router->handleUrl($_SERVER['REQUEST_URI']); 










