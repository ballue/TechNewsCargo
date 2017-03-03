<?php

namespace Application\Controllers;

use Application\Models\News\ArticleDb;
use Application\Models\News\CategorieDb;

// -- Utilisation de Idiorm
use Application\Models\Db\DBFactory;
use Application\Models\Db\ORM;

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
    
    /**
     * Test de Fonctionnement de IDIORM
     */
    public function idiorm() {
        
        // -- Initialisation de la Connexion à la BDD
        DBFactory::start();
        
        // -- Quelques tests de requètes
        
            // -- Afficher les Catégories
            //$categories = ORM::for_table('categorie')->find_result_set();
            //print_r($categories);
        
            //foreach ($categories as $categorie) {
            //    echo $categorie->LIBELLECATEGORIE.'<br>';
            //}
            
            // -- Afficher les Auteurs dans un Tableau
            $auteurs = ORM::for_table('auteur')->find_result_set();
            //print_r($auteurs);
            echo '<table border="1">';
                    
                    foreach ($auteurs as $auteur) {

                        echo '<tr>';
                            echo '<td>'.$auteur->IDAUTEUR.'</td>';
                            echo '<td>'.$auteur->PRENOMAUTEUR.'</td>';
                            echo '<td>'.$auteur->NOMAUTEUR.'</td>';
                            echo '<td>'.$auteur->EMAILAUTEUR.'</td>';
                        echo '</tr>';
                    }
                
            echo '</table>';
        
    }
    
    /**
     * Vue qui permet l'affichage d'un article en particulier
     */
    public function article() {
        
        // -- Connexion à la BDD
        DBFactory::start();
        
        // -- Récupération de l'Article
        // print_r($_GET);
        
        // -- Avec IDIORM
        $article        = ORM::for_table('view_articles')->find_one($_GET['idarticle']);
        $tags           = ORM::for_table('view_tags')->where('IDARTICLE', $_GET['idarticle'])->find_result_set();
        $suggestions    = ORM::for_table('view_articles')->where('IDCATEGORIE', $article->IDCATEGORIE)->limit(4)->find_result_set();
        
        // -- Avec ArticleDB
        # : $article = $ArticleDb->fetchOne($idarticle, 'IDARTICLE');
        //print_r($article);
       
        $this->render('news/article', ['article' => $article, 'tags' => $tags, 'suggestions' => $suggestions]);
        
    }
    
}






    















