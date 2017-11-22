<?php

//Chargement des classes 
require('model/PostManager.php');
require('model/CommentManager.php');


function listPosts()
{
	$PostManager = new OpenClassrooms\Blog\Model\PostManager(); //creation d'un objet
	$posts = $PostManager->getPosts(); //appel d'une fonction de cet objet : ("$postManager")
	if($posts === false)
	{
		throw new Exception('Impossible d\'afficher les posts');
	}
	else
	{
		require("view/frontend/listPostView.php");
	}					
}


function post()
{

    $PostManager = new OpenClassrooms\Blog\Model\PostManager();

    $post = $PostManager->getPost($_GET['id']);

    if($post === false)
	{
		throw new Exception('Impossible d\'afficher le post');
	}
	else
	{
		require('view/frontend/postView.php');
	}    
}




function addPost($title, $chapo, $content, $author)
{
	$PostManager = new OpenClassrooms\Blog\Model\PostManager();
	$affectedLines = $PostManager->postPost($title, $chapo, $content, $author);

	if($affectedLines == false)
	{

		throw new Exception('Impossible d\'ajouter le post');
	}
	else
	{
		 header('Location: index.php');
	}

}


function deletePost()
{

	$PostManager = new OpenClassrooms\Blog\Model\PostManager();
	$post = $PostManager->removePost($_GET['id']);

	if($post == false)
	{

		throw new Exception('Impossible de supprimer le post');
	}
	else
	{
		 header('Location: index.php?action=listPosts');
	}


}



