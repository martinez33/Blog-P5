<?php
namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");
class CommentManager extends Manager
{

	public function getComments($postId)
	{
    	$db = $this->dbConnect();
    	$comments = $db->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaires WHERE id_billets = ? ORDER BY date_commentaire DESC LIMIT 0, 5');
    	$comments->execute(array($postId));

    	return $comments;
	}

	public function getComment($commentId)
	{
	    $db = $this->dbConnect();
	    $req = $db->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaires WHERE id = ?');
	    $req->execute(array($commentId));
	    $comment = $req->fetch();

	    return $comment;
	}


	public function postComment($postId, $author, $comment)
	{
    	$db = $this->dbConnect();
    	$comments = $db->prepare('INSERT INTO commentaires(id_billets, auteur, commentaire, date_commentaire) VALUES (?, ?, ?, NOW())');

   		$affectedLines = $comments->execute(array($postId, $author, $comment));

    	return $affectedLines;
	}

	public function updateComment($commentId, $author, $comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('UPDATE commentaires SET auteur="'. $_POST['author'] .'", commentaire="'. $_POST['comment'] .'", date_commentaire=NOW()  WHERE id="'. $_GET['idCom'] .'"');

		$modifiedLines = $comments->execute(array($commentId, $author, $comment));

		return $modifiedLines;
	}
}














