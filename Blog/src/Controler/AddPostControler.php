<?php

namespace App\Controler;

use App\Managers\PostManager;

/**
 * Controle l'ajout de post.
 */
class AddPostControler
{
    /**
     * @var array
     */
    private $blogPosts;

    /**
     * Constructor.
     *
     * instancie un objet PostMPanager
     */
    public function __construct()
    {
        $this->blogPosts = new PostManager();
    }

    /**
     * Fonction invoqué pour construire et créer le post.
     */
    public function __invoke()
    {
        try {
            if (!empty($_POST['title']) && !empty($_POST['chapo'])
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
