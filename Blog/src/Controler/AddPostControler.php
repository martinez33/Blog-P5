<?php 


namespace App\Controler;

//require './vendor/autoload.php';


use App\Managers\PostManager;

class AddPostControler {

	private $blogPosts;


	public function __construct() {
	
    $this->blogPosts = new PostManager();
    
  	}

  


	public function __invoke() //addPost
	{
		if(!empty($_POST['title']) && !empty($_POST['chapo']) && !empty($_POST['content']) && !empty($_POST['author'])){

			//var_dump($_POST['title']);die();

			$post = $this->blogPosts->buildCrea($_POST);

			$this->blogPosts->createPost($post);
			

			if($post == false)
			{

				throw new \Exception('Impossible d\'ajouter le post');
			}
			else
			{
				 header('Location: /Blog-p5/blog/');
			}
		}
		else{

			throw new \Exception('Tous les champs ne sont pas remplis !');
		}
	}


}