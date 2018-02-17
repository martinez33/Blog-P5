<?php 

namespace Core\Routers;


class Route 
{

    private $path;
    private $action;
    private $method;
    private $params = [];
    private $controler;


    public function __construct($path, $action, $params=null, $method = 'GET')
    {

        $this->path = $path;
        $this->action = $action;
        $this->method = $method;        
        $this->params = $params;

    }

	public function getPath()
    {

	    return $this->path;

	}

	public function getAction()
    {

	   	return $this->action;

	}

	public function getParams()
    {

	    return $this->params[':id'];

	}

    public function getControler()
    {

    	return $this->controler;

    }

    public function getMethod()
    {

    	return $this->method;

    }
   
	public function setPath($path)
    {

	    $this->path = $path;

	}

	public function setAction($action)
    {

	    $this->action = $action;

	}

	public function setParams($params)
    {

	    $this->params[':id'] = $params;

	}

    public function setControler($controler)
    {

    	$regex = '#Config#';
    	$replace = '';

    	$controler = preg_replace($regex, $replace, $controler);
    	$this->controler = new $controler();

    }

    public function setMethod($method)
    {

    	$this->method = $method;

    }

}
