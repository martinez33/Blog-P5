<?php 


namespace App\Controler;

require './vendor/autoload.php';

use App\Managers\PostManager;


class PostControler {

	private $onePost;


	public function __construct() {
	
    $this->onePost = new PostManager();
    
  }

  

	public function post()
	{

	    $post = $this->onePost->getPostById($_GET['id']);


	    if($post === false)
		{
			throw new Exception('Impossible d\'afficher le post');
		}
		else
		{
			require('src/View/frontend/postView.php');
		}    
	}


	public function modifPost()
	{

		
		$post = $this->onePost->buildCrea($_POST);
		
		$updt = $this->onePost->updatePost($_GET['id'], $post);
		//var_dump($updt);
		if($post === false)
		{
			throw new Exception('Impossible de modifier le post'); 
		}
		else
		{
			header('Location: index.php?action=blog');
			
		}
	}




	public function deletePost()
	{

		
		$post = $this->onePost->removePost($_GET['id']);
	

		if($post === false)
		{

			throw new Exception('Impossible de supprimer le post');
		}
		else
		{
			 header('Location: index.php?action=home');
		}
		

	}


}