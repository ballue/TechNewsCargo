<?php
namespace Application\Controllers;

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
            
            // -- Inclusion de la Vue
            include_once VIEW_SITE.'/'.$view.'.php'; // news/index
        
        // -- Affichage du Pied de Page
        require(FOOTER_SITE);
    }
    
    public function getParams() {
        return $this->_viewparams;
    }
}












