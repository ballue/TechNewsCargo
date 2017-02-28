<?php
namespace Application\Controllers;

class appController
{
    private $_viewparams;
    
    /**
     * Permet de g�n�rer l'affichage de la vue pass�e en param�tres
     * @param String $view Vue � afficher
     */
    protected function render($view, $viewparam = '') {
        
        // -- R�cup�ration et Affectation des Param�tres de la Vue
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












