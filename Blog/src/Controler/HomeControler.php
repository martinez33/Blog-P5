<?php

namespace App\Controler;

use App\Managers\PostManager;

/**
 * Controle l'affichage du home
 */
class HomeControler
{
    /**
     * @var array $homePost
     */
    private $homePost;

    /**
     * Constructor
     *
     * instancie un objet PostMPanager
     */
    public function __construct()
    {
        $this->homePost = new PostManager();
    }

    /**
     * Fonction invoqué pour afficher les posts
     *
     * de la page home
     */
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
