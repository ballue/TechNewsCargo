<?php

namespace Application\Controllers;

use Application\Models\News\CategorieDb;

class newsController extends \Application\Controllers\appController {
    
    public function index() {
    
        // -- Connexion à la BDD
        $CategorieDb = new CategorieDb();
        
        // -- Récupération des Catégories
        $categories = $CategorieDb->fetchAll();
        
        $this->render('news/index', ['categories' => $categories]);
    }
    
    public function business() {
        
        echo '<h1>JE SUIS LA PAGE BUSINESS</h1>';
        
    }
    
}