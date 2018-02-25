<?php

namespace Core\Routers;

/**
 * Build, initialize and send back routes.
 */
class Route
{
    /**
     * @var string $path
     */
    private $path;

    /**
     * @var string $action
     */
    private $action;

    /**
     * @var string $method
     */
    private $method;

    /**
     * @var array  $params
     */
    private $params = [];

    /**
     * @var string $controler
     */
    private $controler;
    
    /**
     * Constructor
     *
     * @param string $path    path value
     * @param string $action  action route
     * @param array  $paprams parameters table
     * @param string $method  data recovery method
     */
    public function __construct(
        $path,
        $action,
        $params = null,
        $method = 'GET'
    ) {
        $this->path = $path;
        $this->action = $action;
        $this->method = $method;
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params[':id'];
    }

    /**
     * @return string
     */
    public function getControler()
    {
        return $this->controler;
    }

    /**
     * @param string $path path value
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @param string $action action route
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @param array $params parameters table
     */
    public function setParams($params)
    {
        $this->params[':id'] = $params;
    }

    /**
     * @param string $controler assigned action
     */
    public function setControler($controler)
    {
        $regex = '#Config#';
        $replace = '';

        $controler = preg_replace($regex, $replace, $controler);
        $this->controler = new $controler();
    }

    /**
     * @param string $method data recovery method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }
}
