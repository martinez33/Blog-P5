<?php

namespace App\Managers;

require './vendor/autoload.php';
/*require_once("managers/Manager.php");
require_once("managers/Validator.php");
require_once("model/Post.php");*/

use App\Model\Post;
use App\Managers\Manager;
use App\Managers\Validator;


class PostManager extends Manager
{

	//propriétées class Post


	
	private $entries = [];
	


 	public function getEntries(){

	 	return $this->entries;
	 }


	public function getPosts(){


		$req = $this->db->prepare('SELECT id, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creationDateFr, DATE_FORMAT(modificationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS modificationDateFr, title, chapo, content, author  FROM post ORDER BY creationDate DESC LIMIT 0, 20');
		
		 $req->execute();

		$datas = $req->fetchall();		

		foreach ($datas as $post) {
			
			 $this->entries[] = $this->buildModel($post);

			 //var_dump($this->entries);
		}

		return $this->getEntries();	

	}


	public function getHomePosts(){

		//var_dump($this->db);

		$req = $this->db->prepare('SELECT id, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creationDateFr, DATE_FORMAT(modificationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS modificationDateFr, title, chapo, content, author  FROM post ORDER BY creationDate DESC LIMIT 0, 3');
		
		 $req->execute();

		$datas = $req->fetchall();		

		foreach ($datas as $post) {
			
			 $this->entries[] = $this->buildModel($post);

			 //var_dump($this->entries);
		}

		return $this->getEntries();	

	}


	public function getPostById($id){

		$req = $this->db->prepare('SELECT id, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDateFr, DATE_FORMAT(modificationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS modificationDateFr, title, chapo, content, author  FROM post WHERE id = :id');

		$req->execute([':id' => $id]);

		$datas = $req->fetchall();

		foreach ($datas as $post) {

			
			$this->entries[] = $this->buildModel($post);

			 //var_dump($this->entries);
		}

		return $this->getEntries();
	}



	public function createPost(Post $post){

		//$id = (int) $id;

		$error = $this->validator->checkSQL($post->getTitle());
		//var_dump($error);die();

		if ($error) {
      		throw new Exception('Erreur : une injection SQL est détéctée !');
    	}
		//traitement errror SQL


		$req = $this->db->prepare('INSERT INTO post(creationDate, title, chapo, content, author, status) VALUES ( NOW(), :title, :chapo, :content, :author, "created")');

		  $req->execute([
        ':title' => htmlspecialchars($post->getTitle()),
        ':chapo' => htmlspecialchars($post->getChapo()),
        ':content' => htmlspecialchars($post->getContent()),
        ':author' => htmlspecialchars($post->getAuthor())
      ]);
		 var_dump($post);
	}



	public function updatePost($id, Post $post){

		//$id = (int) $id;

		$error = $this->validator->checkSQL($post);
		//var_dump($error);//die();

		if ($error) {
      		throw new Exception('Erreur : une injection SQL détéctée !');
    	}
		//traitement errror SQL


		$req = $this->db->prepare('UPDATE post SET modificationDate=NOW(), title=:title, chapo=:chapo, content=:content, author=:author, status="modified" WHERE id=:id');
		  $req->execute([
		':id' => $id,
        ':title' => htmlspecialchars($post->getTitle()),
        ':chapo' => htmlspecialchars($post->getChapo()),
        ':content' => htmlspecialchars($post->getContent()),
        ':author' => htmlspecialchars($post->getAuthor())
      ]);


	}



	public function removePost($id){
		
		//$id = (int) $id;


		$error = $this->validator->checkSQL($_GET);
		//var_dump($error);//die();

		if ($error) {
      		throw new Exception('Erreur : une injection SQL détéctée !');
    	}
		//traitement errror SQL


		$req = $this->db->prepare('DELETE FROM post WHERE id = :id');
		//var_dump((int) $id);
		$req->execute([':id' => $id]);
	}


	


	public function buildModel($data)
	{
	    $post = new Post();

	    $post->setId($data['id']);
	    $post->setCreationDate($data['creationDateFr']);
	    $post->setModificationDate($data['modificationDateFr']);
	    $post->setTitle($data['title']);
	    $post->setChapo($data['chapo']);
	    $post->setContent($data['content']);
	    $post->setAuthor($data['author']);
	    

	    return $post;
	 }



	 public function buildCrea($data)
	{
	    $post = new Post();

	    $post->setTitle($data['title']);
	    $post->setChapo($data['chapo']);
	    $post->setContent($data['content']);
	    $post->setAuthor($data['author']);
	    

	    return $post;
	 }

	public function buildExtrait($data)
	{
	    $post = new Post();

	    $post->setId($data['id']);
	    $post->setCreationDate($data['creationDateFr']);
	    $post->setModificationDate($data['modificationDateFr']);
	    $post->setTitle($data['title']);
	    $post->setChapo($data['chapo']);
	    $post->setContent($data['content']);
	    $post->setAuthor($data['author']);
	    

	    return $post;
	 }

	
}

	

