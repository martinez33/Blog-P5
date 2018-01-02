<?php 

namespace App\Model;
/**
* 
*/
class Post 
{
	
	
	private $id;
	private $creationDate;
	private $modificationDate;
	private $title;
	private $chapo;
	private $content;
	private $author;
	
	//Getters

	public function getId(){

		return $this->id;
	}


	public function getCreationDate(){

		return $this->creationDate;
	}


	public function getModificationDate(){

		return $this->modificationDate;
	}


	public function getTitle(){

		return $this->title;
	}


	public function getChapo(){

		return $this->chapo;
	}


	public function getContent(){

		return $this->content;
	}


	public function getAuthor(){

		return $this->author;
	}

	public function getExtContent(){

	return '<p>' . substr($this->content, 0, 150) . '...</p>';


	}

	
	//Setters


	public function setId($id){

		 $this->id = $id;
	}


	public function setCreationDate($creationDate){

		 $this->creationDate = $creationDate;
	}


	public function setModificationDate($modificationDate){

		 $this->modificationDate = $modificationDate;
	}


	public function setTitle($title){

		 $this->title = $title;
	}


	public function setChapo($chapo){

		 $this->chapo = $chapo;
	}


	public function setContent($content){

		 $this->content = $content;
	}


	public function setAuthor($author){

		 $this->author = $author;
	}
	




}