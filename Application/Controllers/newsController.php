<?php

namespace Application\Controllers;

use Application\Models\News\ArticleDb;
use Application\Models\News\CategorieDb;

class newsController extends \Application\Controllers\appController {
    
    public function index() {
    
        // -- Connexion à la BDD
        $ArticleDb = new ArticleDb();
        
        // -- Récupération des Articles
        $articles  = $ArticleDb->fetchAll();
        
        $where = 'SPOTLIGHTARTICLE = 1';
        $spotlight = $ArticleDb->fetchAll($where);
        
        $this->render('news/index', ['articles' => $articles, 'spotlight' => $spotlight]);
    }
    
    public function business() {
        // ----------------------------- PREMIERE METHODE ----------------------------- //
        
            // -- Connexion à la BDD
            $ArticleDb = new ArticleDb();
            $articles  = $ArticleDb->fetchAll('IDCATEGORIE = 2');
        
        // ----------------------------- DEUXIEME METHODE ----------------------------- //
        
            $articles = $this->getArticlesbyCategory(ucfirst(__FUNCTION__));
            
        // -- Affichage dans la Vue
        $this->render('news/categorie', ['articles' => $articles]);
        
    }
    
    public function computing() {
        // -- Connexion à la BDD
        $ArticleDb = new ArticleDb();
        $articles  = $ArticleDb->fetchAll('IDCATEGORIE = 3');
        // -- Affichage dans la Vue
        $this->render('news/categorie', ['articles' => $articles]);
    }
    
    public function tech() {
        // -- Connexion à la BDD
        $ArticleDb = new ArticleDb();
        $articles  = $ArticleDb->fetchAll('IDCATEGORIE = 4');
        // -- Affichage dans la Vue
        $this->render('news/categorie', ['articles' => $articles]);
    }
    
    private function getArticlesbyCategory($LIBELLECATEGORIE) {
        $CategorieDb = new CategorieDb();
        $ArticleDb   = new ArticleDb();
        
        $Categorie = $CategorieDb->fetchOne($LIBELLECATEGORIE, 'LIBELLECATEGORIE');
        return $ArticleDb->fetchAll('IDCATEGORIE = '.$Categorie->getIDCATEGORIE());
    }
    
}
    















