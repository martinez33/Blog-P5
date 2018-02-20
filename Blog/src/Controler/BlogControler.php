<?php 

namespace App\Controler;

use App\Managers\PostManager;

/**
 * Controle l'affichage des posts
 */
class BlogControler
{
    /**
     * @var array $blogPosts
     */
    private $blogPosts;

    /**
     * Constructor
     *
     * instancie un objet PostMPanager
     */
    public function __construct()
    {
        $this->blogPosts = new PostManager();
    }
    
    /**
     * Fonction invoqué pour afficher les posts
     */
    public function __invoke()
    {
        try {
            $posts = $this->blogPosts->getPosts();

            if ($posts === false) {
                throw new \Exception('Impossible d\'afficher les posts');
            } else {
                require("../src/View/frontend/blogView.php");
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();

            require('../src/View/frontend/errorView.php');
        }
    }
}
