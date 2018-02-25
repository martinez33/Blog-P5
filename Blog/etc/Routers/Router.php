<?php

namespace Core\Routers;

/**
 * Load routes, compare routes with
 *
 * URL and call action which matches with URL
 */
class Router
{
    /**
     * @var array $routes
     */
    private $routes = [];

    /**
     * @var string $params
     */
    private $params;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->loadRoutes();
    }

    /**
     * Load ways and fill in array ways.
     */
    public function loadRoutes()
    {
        $tabRoutes = require __DIR__.'./../../config/routes.php';

        foreach ($tabRoutes as $route) {
            $this->routes[] = new Route($route['path'], $route['action'], $route['params'], $route['method']);
        }
    }

    /**
     * @param string $url
     * @return array
     */
    public function match($url)
    {
        if (preg_match('#\/([0-9]+)#', $url, $matchId)) {
            $this->params = $matchId[1];

            $url = preg_replace('#([0-9]+)#', ':id', $url);
        }

        if (preg_match('#(\/([\w:\/]*))#', $url, $matches)) {
            return $matches[0];
        }
    }

    /**
     * @param string $url
     * @return string
     * @throws \Exception
     * @throws \Exception
     */
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
            if ($tmp) {
                $max = count($this->routes);

                for ($i = 0; $i < $max; ++$i) {
                    if ($this->routes[$i]->getPath() === $this->match($url)
                        && null != $this->routes[$i]->getMethod()
                        && !$this->routes[$i]->getParams()
                    ) {
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
            } elseif ('500' === $_SERVER['DOCUMENT_ROOT']) {
                throw new \Exception('Erreur 500  Un problème est survenue avec le serveur !');
            } else {
                throw new \Exception('Erreur 404 La page n\'existe pas !');
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();

            require '../src/View/frontend/error404-500View.php';
        }
    }
}
