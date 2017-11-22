<?php
namespace OpenClassrooms\Blog\Model;
	
class Manager 
{

	protected function dbConnect()
	{
	    try
	    {
	        $db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'moderohihikvog4oj4');
	        return $db;
	    }
	    catch(Exception $e)
	    {
	        die('Erreur : '.$e->getMessage());
	    }
	}



}