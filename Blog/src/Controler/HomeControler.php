<?php 
namespace App\Controler;

use App\Managers\PostManager;

class HomeControler
{
    private $homePost;


    public function __construct()
    {
        $this->homePost = new PostManager();
    }

    public function __invoke()
    {
        try {
            $posts = $this->homePost->getHomePosts();

            if ($posts === false) {
                throw new Exception('Impossible d\'afficher les posts');
            } else {
                require("../src/View/frontend/homeView.php");
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();

            require('../src/View/frontend/errorView.php');
        }
    }
}
