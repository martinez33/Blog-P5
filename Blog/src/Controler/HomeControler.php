<?php 

namespace App\Controler;



use App\Managers\PostManager;


class HomeControler {

	private $homePost;


	public function __construct() {
	
    $this->homePost = new PostManager();
    
  }

  

	public function __invoke()
	{
		$posts = $this->homePost->getHomePosts(); 
		if($posts === false)
		{
			throw new Exception('Impossible d\'afficher les posts');
		}
		else
		{
			require("../src/View/frontend/homeView.php");
		}					
	}





}
