<?php

namespace App\Controler;

/**
 * Controle l'affichage de la page de contact
 */
class ContactControler
{
    /**
     * Fonction invoqué pour afficher la page de contact
     */
    public function __invoke()
    {
        require("../src/View/frontend/contactView.php");
    }
}
