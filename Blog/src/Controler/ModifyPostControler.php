<?php 


namespace App\Controler;

//require './vendor/autoload.php';

use App\Managers\PostManager;


class ModifyPostControler {

	private $onePost;


	public function __construct() {
	
    $this->onePost = new PostManager();
    
  }

  

	public function __invoke($id) //modifPost
	{

		
		$post = $this->onePost->buildCrea($_POST);
		
		$updt = $this->onePost->updatePost($id, $post); //$_GET['id']
		//var_dump($updt);
		if($post === false)
		{
			throw new Exception('Impossible de modifier le post'); 
		}
		else
		{
			header('Location: /Blog-p5/blog/');
			
		}
	}







}