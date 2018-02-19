<?php
namespace Core\Routers;


class Router
{

    private $routes = [];
    private $params;
  

    public function __construct()
    {

        $this->loadRoutes();

    }

    public function loadRoutes()
    {

        $tabRoutes = require __DIR__ . './../../config/routes.php';

        foreach ($tabRoutes as $route) {

            $this->routes[] = new Route($route['path'], $route['action'], $route['params'], $route['method']);
     
        } 

    }

    public function match($url)
    {

        if(preg_match('#\/([0-9]+)#', $url, $matchId)) {

            $this->params = $matchId[1];

            $url = preg_replace('#([0-9]+)#', ':id', $url);
        
        }

        if(preg_match('#(\/([\w:\/]*))#', $url, $matches)) {

            return $matches[0];

      } 
      
    }

    public function handleUrl($url)
    {

        $tmp = false;

        foreach ($this->routes as $route) {

            switch ($route->getPath()) {

                case $this->match($url):

                    $tmp = true;

                    break;

            } 

        }

        try {
           
            if($tmp) {

                $max = count($this->routes);

                for ($i=0; $i < $max  ; $i++) { 
           
                    if($this->routes[$i]->getPath() === $this->match($url) && $this->routes[$i]->getMethod() != null && !$this->routes[$i]->getParams() ) {
                  
                        $this->routes[$i]->setControler($this->routes[$i]->getAction());
                 
                        $controler = $this->routes[$i]->getControler(); 

                        return $controler(); 

                    } elseif ($this->routes[$i]->getPath() === $this->match($url)) {
              
                        $this->routes[$i]->setParams($this->params);

                        $this->routes[$i]->setControler($this->routes[$i]->getAction()); 

                        $controler = $this->routes[$i]->getControler();

                        return $controler($this->params);
                    }

                }

            } elseif($_SERVER['DOCUMENT_ROOT'] === '500') {

                throw new \Exception('Erreur 500  Un problème est survenue avec le serveur !'); 

            } else {

                throw new \Exception('Erreur 404 La page n\'existe pas !');

            }

        } catch(\Exception $e) {

            $errorMessage = $e->getMessage();

            require('../src/View/frontend/error404-500View.php');

        }

    }

}    
    



