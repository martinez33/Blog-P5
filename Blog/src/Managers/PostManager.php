<?php

namespace App\Managers;


require './vendor/autoload.php';


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


		$req = $this->db->prepare('SELECT id, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creationDateFr, DATE_FORMAT(modificationDate, \'%d/%m/%Y \') AS modificationDateFr, title, chapo, content, author  FROM post ORDER BY creationDate DESC LIMIT 0, 4');
		
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

		$req = $this->db->prepare('SELECT id, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creationDateFr, DATE_FORMAT(modificationDate, \'%d/%m/%Y \') AS modificationDateFr, title, chapo, content, author  FROM post ORDER BY creationDate DESC LIMIT 0, 2');
		
		 $req->execute();

		$datas = $req->fetchall();		

		foreach ($datas as $post) {
			
			 $this->entries[] = $this->buildModel($post);

			 //var_dump($this->entries);
		}

		return $this->getEntries();	

	}





	public function getPostById($id){

		$req = $this->db->prepare('SELECT id, DATE_FORMAT(creationDate, \'%d/%m/%Y \') AS creationDateFr, DATE_FORMAT(modificationDate, \'%d/%m/%Y \') AS modificationDateFr, title, chapo, content, author  FROM post WHERE id = :id');

		$req->execute([':id' => $id]);

		$datas = $req->fetchall();

		foreach ($datas as $post) {

			
			$this->entries[] = $this->buildModel($post);

			 //var_dump($this->entries);
		}

		return $this->getEntries();
	}






	public function createPost(Post $post){

		try{

			$cleanTitle = $this->validator->checkSQL($post->getTitle($post));

			$error = $this->validator->getError();

			if ($error) {

				$post->setTitle($cleanTitle);
			}

			

			$cleanChapo = $this->validator->checkSQL($post->getChapo($post));

			$error = $this->validator->getError();

			if ($error) {

				$post->setChapo($cleanChapo);
			}


			
			$cleanContent = $this->validator->checkSQL($post->getContent($post));

			$error = $this->validator->getError();

			if ($error) {

				$post->setContent($cleanContent);
			}



			$cleanAuthor = $this->validator->checkSQL($post->getAuthor($post));

			$error = $this->validator->getError();

			if ($error) {

				$post->setAuthor($cleanAuthor);

				throw new \Exception('SQL Injection detected !');			  
			}
			else{

				throw new \Exception('Post created !');
			}

		}
		catch(\Exception $e){

	      	$errorMessage = $e->getMessage();
	      	require('src/View/frontend/successView.php');
	    }


		$req = $this->db->prepare('INSERT INTO post(creationDate, title, chapo, content, author, status) VALUES ( NOW(), :title, :chapo, :content, :author, "created")');
		
		
		$req->execute([
        ':title' => htmlspecialchars($post->getTitle()),
        ':chapo' => htmlspecialchars($post->getChapo()),
        ':content' => htmlspecialchars($post->getContent()),
        ':author' => htmlspecialchars($post->getAuthor())
      ]);

 
	}





	public function updatePost($id, Post $post){

		

		try{

			$cleanTitle = $this->validator->checkSQL($post->getTitle($post));

			$error = $this->validator->getError();

			if ($error) {

				$post->setTitle($cleanTitle);
			}

			

			$cleanChapo = $this->validator->checkSQL($post->getChapo($post));

			$error = $this->validator->getError();

			if ($error) {

				$post->setChapo($cleanChapo);
			}


			
			$cleanContent = $this->validator->checkSQL($post->getContent($post));

			$error = $this->validator->getError();

			if ($error) {

				$post->setContent($cleanContent);
			}



			$cleanAuthor = $this->validator->checkSQL($post->getAuthor($post));

			$error = $this->validator->getError();

			if ($error) {

				$post->setAuthor($cleanAuthor);
			}
			//var_dump($error);
			if($error){

				throw new \Exception('SQL Injection detected !');			  
			}
			else{

				throw new \Exception('Post modified !');
			}

		}
		catch(\Exception $e){

	      	$errorMessage = $e->getMessage();
	      	require('src/View/frontend/successView.php');
	    }


		$req = $this->db->prepare('UPDATE post SET modificationDate=NOW(), title=:title, chapo=:chapo, content=:content, author=:author, status="modified" WHERE id=:id');
		  $req->execute([
		':id' => $id,
        ':title' => htmlspecialchars($post->getTitle()),
        ':chapo' => htmlspecialchars($post->getChapo()),
        ':content' => htmlspecialchars($post->getContent()),
        ':author' => htmlspecialchars($post->getAuthor())
      ]);


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

	

