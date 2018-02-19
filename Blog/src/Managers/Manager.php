<?php
namespace App\Managers;

use Core\Validator;

abstract class Manager
{
    protected $db;
    private $tabDb;
    

    public function __construct()
    {
        $this->getPdo();

        $this->validator = new Validator();
    }

    public function loadCredentials()
    {
        $this->tabDb = 	require __DIR__.'./../../config/database.php';
    }

    public function getPdo()
    {
        try {
            $this->loadCredentials();

            $this->db = new \PDO('mysql:host='.$this->tabDb['host'].';dbname='.$this->tabDb['dbName'].';charset=utf8', $this->tabDb['username'], $this->tabDb['psswd']);
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}
