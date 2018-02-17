<?php 

namespace App\Controler;


use App\Managers\PostManager;


class BlogControler 
{

	private $blogPosts;


	public function __construct() 
	{
	
        $this->blogPosts = new PostManager();
    
  	}

	public function __invoke()
	{

	    try {

            $posts = $this->blogPosts->getPosts(); 

		    if($posts === false) {

			    throw new \Exception('Impossible d\'afficher les posts');

		    } else {

			    require("../src/View/frontend/blogView.php");

		    }

		} catch(\Exception $e) {

	      	$errorMessage = $e->getMessage();

	      	require('../src/View/frontend/errorView.php');

	    }    
							
	}

}
