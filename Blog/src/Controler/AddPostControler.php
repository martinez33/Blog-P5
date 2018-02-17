<?php 

namespace App\Controler;


use App\Managers\PostManager;


class AddPostControler 
{

	private $blogPosts;


	public function __construct() 
	{
	
        $this->blogPosts = new PostManager();
    
  	}

  


	public function __invoke() 
	{
		
		try {

			if(!empty($_POST['title']) && !empty($_POST['chapo']) && !empty($_POST['content']) && !empty($_POST['author'])) {

				$post = $this->blogPosts->buildModel($_POST);

				$this->blogPosts->createPost($post);
				

				if($post == false) {

					throw new \Exception('Impossible d\'ajouter le post');

				} else {

					header('Location: /posts');

				}

			} else {

				throw new \Exception('Tous les champs ne sont pas remplis !');

			}

		} catch(\Exception $e) {

	      	$errorMessage = $e->getMessage();

	      	require('../src/View/frontend/errorView.php');

	    }

	}

}
