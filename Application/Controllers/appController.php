<?php
namespace Application\Controllers;

use Application\Models\News\CategorieDb;

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
    
}





















