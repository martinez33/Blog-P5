<?php

namespace App\Model;

/**
 * Construit le post.
 */
class Post
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $creationDate
     */
    private $creationDate;

    /**
     * @var string $modificationDate
     */
    private $modificationDate;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var string $chapo
     */
    private $chapo;

    /**
     * @var string $content
     */
    private $content;

    /**
     * @var string $author
     */
    private $author;

    /**
     * Hydratation of datas
     *
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
     * @return int $this->id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string $this->creationDate
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @return string $this->modificationDate
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * @return string $this->title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string $this->chapo
     */
    public function getChapo()
    {
        return $this->chapo;
    }

    /**
     * @return string $this->content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     *@return string $this->author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     *@return string $this->content
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
