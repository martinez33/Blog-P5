<?php

namespace Config;

require 'vendor/autoload.php';

use App\Controler\HomeControler;
use App\Controler\BlogControler;
use App\Controler\PostControler;




class Router {

  private $ctrlHome;
  private $ctrlBlog;
  private $ctrlPost;
  

  public function __construct() {
    $this->ctrlHome = new HomeControler();
    $this->ctrlBlog = new BlogControler();
    $this->ctrlPost = new PostControler();
  }


  // Traite une requête entrante
  public function routerRequete() {
    try
    {
      if (isset($_GET['action'])) {
       /*$actionRecup = serialize($_GET['action']);//on serialize
        var_dump(unserialize($actionRecup));//On deserialize et on le restitu comme avant la serialization
        
        die();*/
        if ($_GET['action'] == 'home') {
          $this->ctrlHome->listHomePosts();
        }
        elseif ($_GET['action'] == 'blog') {
          $this->ctrlBlog->listPosts();
        }
        elseif ($_GET['action'] == 'post') {
          if (isset($_GET['id']) && $_GET['id'] > 0) {
            $this->ctrlPost->post();
          }
          else {
            throw new Exception('Erreur : aucun identifiant de post envoyé');
          }
        }
        elseif ($_GET['action'] == 'addPost') {
          if (!empty($_POST['title']) && !empty($_POST['chapo']) && !empty($_POST['content']) && !empty($_POST['author'])) {
            $this->ctrlBlog->addPost();
          }
          else {
            throw new Exception('Erreur : tous les champs ne sont pas remplis !');
          }
        }
        elseif ($_GET['action'] == 'modifPost') {
                  //var_dump($_GET['id']);
          if (isset($_GET['id']) && $_GET['id'] > 0){
            if (!empty($_POST['title']) && !empty($_POST['chapo']) && !empty($_POST['content']) && !empty($_POST['author'])) {
              //var_dump('----OK-----');
              $this->ctrlPost->modifPost();
            }
            else {
              throw new Exception('Erreur : tous les champs ne sont pas remplis !');
            }
          }
          else{
            throw new Exception('Erreur : aucun identifiant de post');
          }
        }
        elseif ($_GET['action'] == 'deletePost') {
          if (isset($_GET['id']) && $_GET['id'] > 0) {
                  //var_dump($_GET['id']);
            $this->ctrlPost->deletePost();
          }
          else {
            throw new Exception('Erreur : impossibl d\'identifier le post !');
          }
        }
      }
      else 
      {
          $this->ctrlHome->listHomePosts();
      }
    }
    catch(Exception $e){

      $errorMessage = $e->getMessage();
      require('view/frontend/errorView.php');
    }
  }

}







