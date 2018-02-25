<?php

namespace App\Controler;

use App\Managers\PostManager;

/**
 * Control posts display
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
     * instantiate an object PostManager
     */
    public function __construct()
    {
        $this->blogPosts = new PostManager();
    }

    /**
     * Display posts
     *
     * @throws \Exception
     */
    public function __invoke()
    {
        try {
            $posts = $this->blogPosts->getPosts();

            if (false === $posts) {
                throw new \Exception('Impossible d\'afficher les posts');
            } else {
                require '../src/View/frontend/blogView.php';
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();

            require '../src/View/frontend/errorView.php';
        }
    }
}
