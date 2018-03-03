<?php

namespace App\Controler;

use App\Managers\PostManager;

/**
 * Control post added
 */
class AddPostControler
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
     * Build and create the post
     *
     * @throws \Exception
     * @throws \Exception
     */
    public function __invoke()
    {
        try {
            if (!empty($_POST['title'])
                && !empty($_POST['chapo'])
                && !empty($_POST['content'])
                && !empty($_POST['author'])
            ) {
                $post = $this->blogPosts->buildModel($_POST);

                $this->blogPosts->createPost($post);

                if (false == $post) {
                    throw new \Exception('Impossible d\'ajouter le post');
                } else {
                    header('Location: /posts');
                }
            } else {
                throw new \Exception('Tous les champs ne sont pas remplis !');
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();

            require '../src/View/frontend/errorView.php';
        }
    }
}
