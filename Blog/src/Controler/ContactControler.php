<?php 
namespace App\Controler;

class ContactControler
{
    public function __invoke()
    {
        require("../src/View/frontend/contactView.php");
    }
}
