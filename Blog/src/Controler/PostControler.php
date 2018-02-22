<?php

namespace App\Controler;

use App\Managers\PostManager;

/**
 * Control display post.
 */
class PostControler
{
    /**
     * @var array $onePost
     */
    private $onePost;

    /**
     * Constructor
     *
     * instantiate an object PostManager.
     */
    public function __construct()
    {
        $this->onePost = new PostManager();
    }

    /**
     * Display post
     *
     * @param int $id
     */
    public function __invoke($id)
    {
        try {
            $post = $this->onePost->getPostById($id);

            if (false === $post) {
                throw new Exception('Impossible d\'afficher le post');
            } else {
                require '../src/View/frontend/postView.php';
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();

            require '../src/View/frontend/errorView.php';
        }
    }
}
