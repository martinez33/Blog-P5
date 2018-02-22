<?php

namespace App\Controler;

use App\Managers\PostManager;

/**
 * Control display home page
 */
class HomeControler
{
    /**
     * @var array $homPost
     */
    private $homePost;

    /**
     * Constructor
     *
     * instantiate an object PostMPanager
     */
    public function __construct()
    {
        $this->homePost = new PostManager();
    }

    /**
     * Display posts of home page
     */
    public function __invoke()
    {
        try {
            $posts = $this->homePost->getHomePosts();

            if (false === $posts) {
                throw new Exception('Impossible d\'afficher les posts');
            } else {
                require '../src/View/frontend/homeView.php';
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();

            require '../src/View/frontend/errorView.php';
        }
    }
}
