<?php

namespace App\Managers;

use Core\Validator;

/**
 * Initialize and connect to bdd.
 */
abstract class Manager
{
    /**
     * @var array object PDO $db
     */
    protected $db;

    /**
     * @var array $tabDb
     */
    private $tabDb;

    /**
     * Constructor
     *
     * instantiate an object Validator
     */
    public function __construct()
    {
        $this->getPdo();

        $this->validator = new Validator();
    }

    /**
     * Load config connect
     */
    public function loadCredentials()
    {
        $this->tabDb = require __DIR__.'./../../config/database.php';
    }

    /**
     * Connect to bdd
     */
    public function getPdo()
    {
        try {
            $this->loadCredentials();

            $this->db = new \PDO(
                'mysql:host='.$this->tabDb['host'].
                ';dbname='.$this->tabDb['dbName'].
                ';charset=utf8',
                $this->tabDb['username'],
                $this->tabDb['psswd']
            );
        } catch (PDOException $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}
