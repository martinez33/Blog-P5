<?php
require('controler/frontend.php');
try
{
    if (isset($_GET['action'])) 
    {
        if ($_GET['action'] == 'listPosts') 
        {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Erreur : aucun identifiant de post envoyé');
            }
        }
        elseif ($_GET['action'] == 'addPost') 
        {
            if (!empty($_POST['title']) && !empty($_POST['chapo']) && !empty($_POST['content']) && !empty($_POST['author'])) 
            {
                addPost($_POST['title'], $_POST['chapo'], $_POST['content'], $_POST['author']);
            }
            else 
            {
                throw new Exception('Erreur : tous les champs ne sont pas remplis !');
            }
        }
    }
    else 
    {
        listPosts();
    }
}
catch(Exception $e){

    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}
