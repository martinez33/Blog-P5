<?php 

namespace Core\Routers;

/**
 * Construit, initialise et renvoie les routes
 */
class Route
{
    /**
     * @var string $path
     * @var string $action
     * @var string $method
     * @var array $params
     * @var string $controler
     */
    private $path;
    private $action;
    private $method;
    private $params = [];
    private $controler;

    /**
     * Constructor
     *
     * @param string $path valeur du chemin
     * @param string $action action de la route
     * @param array $paprams tableau de paramètre
     * @param string $method methode de recupération des données
     */
    public function __construct(
        $path,
        $action,
        $method = 'GET',
        $params=null
    ) {
        $this->path = $path;
        $this->action = $action;
        $this->method = $method;
        $this->params = $params;
    }

    /**
     * @return $this->path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return $this->action
     */
    public function getAction()
    {
        return $this->action;
    }
    
    /**
     * @return $this->params[':id']
     */
    public function getParams()
    {
        return $this->params[':id'];
    }
    
    /**
     * @return $this->controler
     */
    public function getControler()
    {
        return $this->controler;
    }
    
    /**
     * @return $this->method
     */
    public function getMethod()
    {
        return $this->method;
    }
    
    /**
     * @param string $path valeur du chemin
     */
    public function setPath($path)
    {
        $this->path = $path;
    }
    
    /**
     * @param string $action action de la route
     */
    public function setAction($action)
    {
        $this->action = $action;
    }
    
    /**
     * @param array $params tableau de paramètre
     */
    public function setParams($params)
    {
        $this->params[':id'] = $params;
    }
    
    /**
     * @param string $controler action attribué
     */
    public function setControler($controler)
    {
        $regex = '#Config#';
        $replace = '';

        $controler = preg_replace($regex, $replace, $controler);
        $this->controler = new $controler();
    }
    
    /**
     * @param string $method methode de recupération des données
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }
}
