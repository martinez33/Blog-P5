<?php 


namespace App\Controler;

require './vendor/autoload.php';


use App\Managers\PostManager;

class BlogControler {

	private $blogPosts;


	public function __construct() {
	
    $this->blogPosts = new PostManager();
    
  	}

  

	public function listPosts(){

		//$PostManager = new PostManager(); //creation d'un objet
		$posts = $this->blogPosts->getPosts(); //appel d'une fonction de cet objet : ("$postManager")

		if($posts === false)
		{
			throw new Exception('Impossible d\'afficher les posts');
		}
		else
		{
			require("src/View/frontend/blogView.php");
		}					
	}


	function addPost()
	{
		
		$post = $this->blogPosts->buildCrea($_POST);

		$this->blogPosts->createPost($post);
		

		if($post == false)
		{

			throw new Exception('Impossible d\'ajouter le post');
		}
		else
		{
			 header('Location: index.php');
		}

	}


}