<?php
namespace Application\Controllers;

use Application\Models\News\CategorieDb;
use Application\Models\News\ArticleDb;

class appController
{
    private $_viewparams;
    
    /**
     * Permet de générer l'affichage de la vue passée en paramètres
     * @param String $view Vue à afficher
     */
    protected function render($view, $viewparam = '') {
        
        // -- Récupération et Affectation des Paramètres de la Vue
        $this->_viewparams = $viewparam;
        
        // -- Affichage de l'En-Tete
        require(HEADER_SITE);
            
            if( file_exists(VIEW_SITE.'/'.$view.'.php') ) {
                // -- Inclusion de la Vue
                include_once VIEW_SITE.'/'.$view.'.php'; // news/index
            } else {
                $this->setParams(['erreur' => 'Le fichier de la vue est introuvable']);
                include_once VIEW_SITE.'/errors/404.php';
            }
        
        // -- Affichage du Pied de Page
        require(FOOTER_SITE);
    }
    
    /**
     * Récupère les Paramètres pour la Vue en Cours.
     * @return string
     */
    public function getParams() {
        return $this->_viewparams;
    }
    
    public function setParams($params) {
        $this->_viewparams = $params;
    }
    
    /**
     * Récupère et Retourne les Catégories dans la BDD
     */
    public function generateCategoryMenu() {
        
        $db = new CategorieDb();
        return $db->fetchAll();
        
    }
    
    /**
     * Récupère et Retourne les 5 Derniers Articles depuis la BDD
     */
    public function getLastFiveArticle() {
        // -- Connexion à la BDD
        $ArticleDb = new ArticleDb();
        return $ArticleDb->fetchAll(null, 'DATECREATIONARTICLE DESC', 5);
    }
    
    /**
     * Récupère et Retourne les articles en avant dans la BDD
     */
    public function getSpecialArticles() {
        // -- Connexion à la BDD
        $ArticleDb = new ArticleDb();
        $where = 'SPECIALARTICLE = 1';
        return $ArticleDb->fetchAll($where);
    }
    
    public function getAction() {
        if(empty($_GET['action'])) {
           return 'accueil';
        }
        return $_GET['action'];
    }
    
}





















