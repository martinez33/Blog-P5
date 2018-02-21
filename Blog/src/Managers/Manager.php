<?php

namespace App\Managers;

use Core\Validator;

/**
 * Initialise et se connecte a la bdd
 */
abstract class Manager
{
    /**
     * @var array $db objet PDO
     * @var array $tabDb récupère la config de connexion
     */
    protected $db;
    private $tabDb;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->getPdo();

        $this->validator = new Validator();
    }
    
    /**
     * Charge la config de connexion
     */
    public function loadCredentials()
    {
        $this->tabDb =  require __DIR__.'./../../config/database.php';
    }
    
    /**
     * Connexion a la bdd
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
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}
