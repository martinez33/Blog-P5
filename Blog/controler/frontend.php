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
    $CommentManager = new OpenClassrooms\Blog\Model\CommentManager(); 

    $post = $PostManager->getPost($_GET['id']);
    $comments = $CommentManager->getComments($_GET['id']);

    if($post === false)
	{
		throw new Exception('Impossible d\'afficher le post');
	}
	elseif($comments === false)
	{
		throw new Exception('Impossible d\'afficher les commmentaires');
	}
	else
	{
		require('view/frontend/postView.php');
	}    
}

function comment()
{
	$PostManager = new OpenClassrooms\Blog\Model\PostManager();
   	$post = $PostManager->getPost($_GET['id']);

	$CommentManager = new OpenClassrooms\Blog\Model\CommentManager();
	$comment = $CommentManager->getComment($_GET['idCom']);

	if($comment === false)
	{
		throw new Exception('Impossible d\'afficher le commentaire');
	}
	else
	{
		require('view/frontend/commentView.php');
	}    
}



function addComment($postId, $author, $comment)
{
	$CommentManager = new OpenClassrooms\Blog\Model\CommentManager();
	$affectedLines = $CommentManager->postComment($postId, $author, $comment);

	if($affectedLines === false)
	{
		throw new Exception('Impossible d\'ajouter le commentaire');
	}
	else
	{
		 header('Location: index.php?action=post&id=' . $postId);
	}
}


function modifyComment($commentId, $author, $comment)
{
	$PostManager = new OpenClassrooms\Blog\Model\PostManager();
   	$post = $PostManager->getPost($_GET['id']);
	
	$CommentManager = new OpenClassrooms\Blog\Model\CommentManager();
	$modifyLines = $CommentManager->updateComment($commentId, $author, $comment);

	if($modifyComment === false)
	{
		throw new Exception('Impossible de modifier le commentaire'); 
	}
	else
	{
		header('Location: index.php?action=post&id=' . $post['id']);
	}
}