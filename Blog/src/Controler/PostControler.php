<?php

namespace App\Controler;

use App\Managers\PostManager;

/**
 * Controle l'affichage d'un post
 */
class PostControler
{
    /**
     * @var array $onePost
     */
    private $onePost;
    
    /**
     * Constructor instancie un objet PostManager
     */
    public function __construct()
    {
        $this->onePost = new PostManager();
    }
    
    /**
     * Fonction invoqué pour afficher un post
     *
     * @param int $id
     */
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
