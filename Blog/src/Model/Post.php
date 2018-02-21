<?php

namespace App\Model;

/**
 * Construit le post.
 */
class Post
{
    /**
     * @var int
     * @var string $creationDate
     * @var string $modificationDate
     * @var string $title
     * @var string $chapo
     * @var string $content
     * @var string $author
     */
    private $id;
    private $creationDate;
    private $modificationDate;
    private $title;
    private $chapo;
    private $content;
    private $author;

    /**
     * @param array $data
     */
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return $this->id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return $this->creationDate
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @return $this->modificationDate
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * @return $this->title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return $this->chapo
     */
    public function getChapo()
    {
        return $this->chapo;
    }

    /**
     * @return $this->content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     *@return $this->author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     *@return '<p>' . substr($this->content, 0, 150) . '...</p>'
     */
    public function getExtContent()
    {
        return '<p>'.substr($this->content, 0, 150).'...</p>';
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $creationDate
     */
    public function setCreationDateFr($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @param string $modificationDate
     */
    public function setModificationDateFr($modificationDate)
    {
        $this->modificationDate = $modificationDate;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $chapo
     */
    public function setChapo($chapo)
    {
        $this->chapo = $chapo;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }
}
