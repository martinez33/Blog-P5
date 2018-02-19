<?php 
namespace App\Model;

use App\Managers\Validator;

class Post
{
    private $id;
    private $creationDate;
    private $modificationDate;
    private $title;
    private $chapo;
    private $content;
    private $author;

    
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);
      
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getChapo()
    {
        return $this->chapo;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getExtContent()
    {
        return '<p>' . substr($this->content, 0, 150) . '...</p>';
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCreationDateFr($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    public function setModificationDateFr($modificationDate)
    {
        $this->modificationDate = $modificationDate;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setChapo($chapo)
    {
        $this->chapo = $chapo;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }
}
