<?php
namespace Application\Controllers;

class adminController extends \Application\Controllers\appController
{
    public function connexion() {
        
        $this->render('admin/connexion');
    }
    
    public function inscription() {
    
        $this->render('admin/inscription');
    }
}

