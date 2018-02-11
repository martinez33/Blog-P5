<?php 


namespace App\Controler;


require './vendor/autoload.php';

use App\Managers\PostManager;


class ModifyPostControler {

	private $onePost;


	public function __construct() {
	
    $this->onePost = new PostManager();
    
  	}

  
	public function __invoke($id) //modifPost
	{

		try{

			if(!empty($_POST['title']) && !empty($_POST['chapo']) && !empty($_POST['content']) && !empty($_POST['author'])){
		
				$post = $this->onePost->buildCrea($_POST);
				
				$updt = $this->onePost->updatePost($id, $post); //$_GET['id']
				//var_dump($updt);
				if($post === false)
				{
					throw new Exception('Impossible de modifier le post'); 
				}
				else
				{
					header('Location: /');
					
				}
			}
			else{

				throw new \Exception('Tous les champs ne sont pas remplis !');
			}
		}
		catch(\Exception $e){

	      	$errorMessage = $e->getMessage();
	      	require('src/View/frontend/errorView.php');
	    }
	}


}
