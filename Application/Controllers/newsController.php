<?php

namespace Application\Controllers;

use Application\Models\News\ArticleDb;

class newsController extends \Application\Controllers\appController {
    
    public function index() {
    
        // -- Connexion � la BDD
        $ArticleDb = new ArticleDb();
        
        // -- R�cup�ration des Articles
        $articles  = $ArticleDb->fetchAll();
        
        $where = 'SPOTLIGHTARTICLE = 1';
        $spotlight = $ArticleDb->fetchAll($where);
        
        $this->render('news/index', ['articles' => $articles, 'spotlight' => $spotlight]);
    }
    
}