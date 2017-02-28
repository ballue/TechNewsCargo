<?php

namespace Application\Controllers;

use Application\Models\News\CategorieDb;

class newsController extends \Application\Controllers\appController {
    
    public function index() {
    
        // -- Connexion � la BDD
        $CategorieDb = new CategorieDb();
        
        // -- R�cup�ration des Cat�gories
        $categories = $CategorieDb->fetchAll();
        
        $this->render('news/index', ['categories' => $categories]);
    }
    
    public function business() {
        
        echo '<h1>JE SUIS LA PAGE BUSINESS</h1>';
        
    }
    
}