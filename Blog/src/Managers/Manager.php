<?php

namespace App\Managers;

use Core\Validator;


	
abstract class Manager 
{

	protected $db;
	

	public function __construct(){

		 $this->getPdo();
		 $this->validator = new Validator();
	}


	public function getPdo()
	{
	    try
	    {
	        $this->db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
	    }
	    catch(Exception $e)
	    {
	        die('Erreur : '.$e->getMessage());
	    }
	}



}