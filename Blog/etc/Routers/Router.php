<?php
 
namespace Core\Routers;
 
require 'vendor/autoload.php';
 
 
 
 
 
 
class Router {
 
   private $routes = [];
   private $params;
   
   
 
 
   public function __construct(){
 
     $this->loadRoutes();
 
   }
 
 
   public function loadRoutes(){
 
     $tabRoutes = require __DIR__ . './../../config/routes.php';
 
     
     foreach ($tabRoutes as $route) {
 
       $this->routes[] = new Route($route['path'], $route['action'], $route['params'], $route['method']);
      /* echo'--routes-----<pre>';
     echo print_r($tabRoutes, true);
     echo'----------<pre>';
 
     echo'----$route-------<pre>';
     echo print_r($route, true);
     echo'-------------<pre>';
 
     echo'-------$this->routes-dans-- foreach---<pre>';
     echo print_r($this->routes, true);
     echo'--------------<pre>';*/
       
     
     }
    /* echo'------this->routes ---hors---foreach---<pre>';
     echo print_r($this->routes[2]->getParams(), true); //on peut boucler et comparer le path avec l'url !
     echo'<pre>';*/
 
   }
 
 
 
 
  public function match($url){

    //var_dump($_SERVER['REQUEST_URI']);
 
     $regex = '#^\/([a-zA-Z0-9 -]+)(\/[\w]+)#';
     $replace = '';
 
     $url = preg_replace($regex, $replace, $url); //suppression de /Blog-p5/blog
 
     
      /* echo'<pre>';
     echo print_r($url, true);
     echo'<pre>';*/
 
     //$this->routes->setParams();
 
    if(preg_match('#\/([0-9]+)#', $url, $matchId)){
 
 
         $this->params = $matchId[1];
 
         $url = preg_replace('#([0-9]+)#', ':id', $url);
        
    }
 
     /*echo'<pre>';
    echo print_r($matchId, true);
    echo'<pre>';*/
 
 
    //echo 'Appelee par la methode handleUrl dont l url est :' .$url;
    /*echo'<pre>';
    echo print_r($this->routes, true);
    echo'<pre>';*/
    //foreach ($this->routes as $route) {
 
      /*echo'<pre>';
    echo print_r($route, true);
    echo'<pre>';*/
 
     // $savedPath = $route->getPath();
 
      //var_dump($savedPath);
      if(preg_match('#(\/([\w:\/]*))#', $url, $matches)){
 
 
        
        /*echo'---------url--------<pre>';
         echo print_r($url, true);
         echo'<pre>';
 
         echo'---------matches0--------<pre>';
         echo print_r($matches, true);
         echo'<pre>';*/
     
 
       return $matches[0];
 
       }
       else{
         echo "L' url n'a pas matcher !";
       }
       /*$route->setPath($matches[0]);
 
       $savedPath = $route->getPath();
 
       echo'<pre>';
     echo print_r($savedPath, true);
     echo'<pre>';
       
       //$params = preg_match('#\/([0-9])#', $route, $matches ); //27
 
       //var_dump($params);
       /*$avedPath = $route->getPath(); // '/' ou '/posts' ou '/posts/:id'
 
       $linkedAction = 
 
       $id = preg_match('#\/:([\w])#', $savePath, $match ); //:id
 
       $route->setPath(preg_replace($id, $params));*/
     //}
 
 
    
 
     //return $matches[0];
  }
 
 
  public function handleUrl($url){
 
       
       //var_dump($this->match($url));
 
       $max = count($this->routes);
       for ($i=0; $i < $max  ; $i++) { 
          /*echo '<pre>';
          echo $this->routes;
          echo '<pre>';*/
         if($this->routes[$i]->getPath() === $this->match($url) && $this->routes[$i]->getMethod() != null && !$this->routes[$i]->getParams() ){
                 //var_dump($i);
                 $this->routes[$i]->setControler($this->routes[$i]->getAction());
                
                 /*echo'------this->routes---<pre>';
                 echo print_r( $this->getData(), true); //on peut boucler et comparer le path avec l'url !
                 echo'<pre>'; */
 
                $controler = $this->routes[$i]->getControler(); //$this->getData()
                 
 
                //var_dump($controler);
             //$controler = $this->routes->getControler();
 
             return $controler(); //$this->getData()
         }
        elseif ($this->routes[$i]->getPath() === $this->match($url)) {
             
             $this->routes[$i]->setParams($this->params);
 
             $this->routes[$i]->setControler($this->routes[$i]->getAction()); //, $this->routes[$i]->getParams($this->params)
 
             $controler = $this->routes[$i]->getControler();

             var_dump($_SERVER['REQUEST_URI']);
 
             return $controler($this->params);
 
        }
      }
       /*foreach ($this->routes as $route) {
         switch ($url) {
           case $this->match($url):
             echo "----OK----Matché Appel le ctrl associée !";
             break;
           
           default:
             echo "----NO matching !---";
             break;
         }
         
       } //var_dump($route);*/
  }
}

 
 
 
 
 
 
 
 /*  private $ctrlHome;
   private $ctrlBlog;
   private $ctrlPost;
   
 
   public function __construct() {
     //$this->url = $url;
     $this->ctrlHome = new HomeControler();
     $this->ctrlBlog = new BlogControler();
     $this->ctrlPost = new PostControler();
   }
 
 
   // Traite une requête entrante
   public function routerRequete() {
     try
     {
       if (isset($_GET['url'])) {
        
         if ($_GET['url'] == 'home') {
           $this->ctrlHome->listHomePosts();
         }
         elseif ($_GET['url'] == 'blog') {
           $this->ctrlBlog->listPosts();
         }
         elseif ($_GET['url'] == 'post') {
           if (isset($_GET['id']) && $_GET['id'] > 0) {
             $this->ctrlPost->post();
           }
           else {
             throw new Exception('Erreur : aucun identifiant de post envoyé');
           }
         }
         elseif ($_GET['url'] == 'addPost') {
           if (!empty($_POST['title']) && !empty($_POST['chapo']) && !empty($_POST['content']) && !empty($_POST['author'])) {
             $this->ctrlBlog->addPost();
           }
           else {
             throw new \Exception('Erreur : tous les champs ne sont pas remplis !');
           }
         }
         elseif ($_GET['url'] == 'modifPost') {
                   //var_dump($_GET['id']);
           if (isset($_GET['id']) && $_GET['id'] > 0){
             if (!empty($_POST['title']) && !empty($_POST['chapo']) && !empty($_POST['content']) && !empty($_POST['author'])) {
               //var_dump('----OK-----');
               $this->ctrlPost->modifPost();
             }
             else {
               throw new Exception('Erreur : tous les champs ne sont pas remplis !');
             }
           }
           else{
             throw new Exception('Erreur : aucun identifiant de post');
           }
         }
         elseif ($_GET['url'] == 'deletePost') {
           if (isset($_GET['id']) && $_GET['id'] > 0) {
                   //var_dump($_GET['id']);
             $this->ctrlPost->deletePost();
           }
           else {
             throw new Exception('Erreur : impossibl d\'identifier le post !');
           }
         }
       }
       else 
       {
           $this->ctrlHome->listHomePosts();
       }
     }
     catch(\Exception $e){
 
       $errorMessage = $e->getMessage();
       require('src/View/frontend/errorView.php');
     }
   }*/
 
 
 
 //---------------------------------------------------------------------------------------
 
 
  /* public function __construct($url){
         
         $this->url = $url;
     }
 
 
 
 
     public function get($path, $callable){
       //var_dump($callable);
       $route = new Route($path, $callable);
       
       $this->routes['GET'][] = $route ; //routes = l'instance de Route = $route qui prend l'url et l'appel de fonction (pousse route dans le tableau routes !)
       
       return $route;
     }
 
 
      
     public function post($path, $callable){
 
     $route = new Route($path, $callable);
     $this->routes['POST'][] = $route ; //routes = l'instance de Route = $route qui prend l'url et l'appel de fonction (pousse route dans le tableau routes !)
 
     }
 
     
 
 
     public function run(){
       if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
 
         throw new RouterException('REQUEST_METHOD does not exist !');
       }/*else{
 
         echo "'---Ok chemin-----'";
       }
 
       foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
         //var_dump($route);
 
         if($route->match($this->url)){
 
           return $route->call();
         }
 
       }
      /*echo '<pre>';
       echo print_r($this->routes);
       echo '<pre>';
 
     
 
       throw new RouterException('No matching routes');
     }/*

     }*/