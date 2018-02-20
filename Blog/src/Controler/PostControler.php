<?php 
namespace App\Controler;

use App\Managers\PostManager;

class PostControler
{
    private $onePost;

    public function __construct()
    {
        $this->onePost = new PostManager();
    }

    public function __invoke($id)
    {
        try {
            $post = $this->onePost->getPostById($id);
        

            if ($post === false) {
                throw new Exception('Impossible d\'afficher le post');
            } else {
                require('../src/View/frontend/postView.php');
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();

            require('../src/View/frontend/errorView.php');
        }
    }
}
