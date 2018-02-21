<?php

namespace App\Managers;

use App\Model\Post;

/**
 * herite de Manager.
 *
 * Contient les fonctionnalités de l'application
 */
class PostManager extends Manager
{
    /**
     * @var array
     */
    private $entries = [];

    /**
     * @return $this->entries
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * @return $this->getEntries()
     */
    public function getPosts()
    {
        $req = $this->db->prepare(
            'SELECT id, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creationDateFr,
            DATE_FORMAT(modificationDate, \'%d/%m/%Y \') AS modificationDateFr,
            title, chapo, content, author FROM post ORDER BY creationDate DESC LIMIT 0, 4'
        );

        $req->execute();

        $datas = $req->fetchall();

        foreach ($datas as $post) {
            $this->entries[] = $this->buildModel($post);
        }

        return $this->getEntries();
    }

    /**
     * @return $this->getEntries()
     */
    public function getHomePosts()
    {
        $req = $this->db->prepare(
            'SELECT id, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creationDateFr,
            DATE_FORMAT(modificationDate, \'%d/%m/%Y \') AS modificationDateFr,
            title, chapo, content, author  FROM post ORDER BY creationDate DESC LIMIT 0, 2'
        );

        $req->execute();

        $datas = $req->fetchall();

        foreach ($datas as $post) {
            $this->entries[] = $this->buildModel($post);
        }

        return $this->getEntries();
    }

    /**
     * @param int $id
     *
     * @return $this->getEntries()
     */
    public function getPostById($id)
    {
        $req = $this->db->prepare(
            'SELECT id, DATE_FORMAT(creationDate, \'%d/%m/%Y \') AS creationDateFr,
            DATE_FORMAT(modificationDate, \'%d/%m/%Y \') AS modificationDateFr,
            title, chapo, content, author  FROM post WHERE id = :id'
        );

        $req->execute([':id' => $id]);

        $datas = $req->fetchall();

        foreach ($datas as $post) {
            $this->entries[] = $this->buildModel($post);
        }

        return $this->getEntries();
    }

    /**
     * @param Post $post
     */
    public function createPost(Post $post)
    {
        try {
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
            } else {
                throw new \Exception('Post created !');
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();

            require '../src/View/frontend/successView.php';
        }

        $req = $this->db->prepare(
            'INSERT INTO post(creationDate, title, chapo, content, author, status)
            VALUES ( NOW(), :title, :chapo, :content, :author, "created")'
        );

        $req->execute([
        ':title' => htmlspecialchars($post->getTitle()),
        ':chapo' => htmlspecialchars($post->getChapo()),
        ':content' => htmlspecialchars($post->getContent()),
        ':author' => htmlspecialchars($post->getAuthor()),
        ]);
    }

    /**
     * @param int  $id
     * @param Post $post
     */
    public function updatePost($id, Post $post)
    {
        try {
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

            if ($error) {
                throw new \Exception('SQL Injection detected !');
            } else {
                throw new \Exception('Post modified !');
            }
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();

            require '../src/View/frontend/successView.php';
        }

        $req = $this->db->prepare(
            'UPDATE post SET modificationDate=NOW(),
            title=:title, chapo=:chapo, content=:content,
            author=:author, status="modified" WHERE id=:id'
        );
        $req->execute([
        ':id' => $id,
        ':title' => htmlspecialchars($post->getTitle()),
        ':chapo' => htmlspecialchars($post->getChapo()),
        ':content' => htmlspecialchars($post->getContent()),
        ':author' => htmlspecialchars($post->getAuthor()),
        ]);
    }

    /**
     * @param array $data
     *
     * @return $post
     */
    public function buildModel($data)
    {
        $post = new Post();

        $post->hydrate($data);

        return $post;
    }
}
