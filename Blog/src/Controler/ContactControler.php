<?php

namespace App\Controler;

/**
 * Control display contact page
 */
class ContactControler
{
    /**
     * Display contact page
     */
    public function __invoke()
    {
        require '../src/View/frontend/contactView.php';
    }
}
