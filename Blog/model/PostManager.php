<?php
namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");
class PostManager extends Manager
{

	public function getPosts()
	{
	    $db = $this->dbConnect();
	    $req = $db->query('SELECT id, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDateFr, DATE_FORMAT(modificationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS modificationDateFr, title, chapo, content, author  FROM post ORDER BY creationDate DESC LIMIT 0, 5');

	    return $req;
	}


	public function getPost($postId)
	{
	    $db = $this->dbConnect();
	    $req = $db->prepare('SELECT id, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDateFr, DATE_FORMAT(modificationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS modificationDateFr, title, chapo, content, author  FROM post WHERE id = ?');
	    $req->execute(array($postId));
	    $post = $req->fetch();

	    return $post;
	}



	public function postPost($title, $chapo, $content, $author)
	{

    	$db = $this->dbConnect();
    	$post = $db->prepare('INSERT INTO post(creationDate, status, title, chapo, content, author) VALUES (NOW(), "created", ?, ?, ?, ?)');

   		return $post->execute(array($title, $chapo, $content, $author));
   		
	}
	
}

	

