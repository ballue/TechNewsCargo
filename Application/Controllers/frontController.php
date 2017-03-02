<?php

namespace Application\Controllers; 

class frontController extends \Application\Controllers\appController {
    
    public function run($params) {
        
        //print_r($params);
        if(empty($params)) {
            $params['controller']   = 'news';
            $params['action']       = 'index';
        }
        
        // -- Récupération des paramètres
        $controller = 'Application\Controllers\\'.$params['controller'].'Controller'; // = newsController
        $action     = $params['action']; // = business
        
        // -- On Vérifie si le fichier du controleur existe avant de l'instancier.
        if( file_exists(RACINE_SITE.'\\'.$controller.'.php') ) {
        
            $obj = new $controller;
        
            // -- Si la méthode existe dans mon controleur, alors je peux executer mon action.
            if( method_exists($obj, $action) ) {
                
                // -- Execution de mon action.
                $obj->$action();
                
            } else {
                
                // -- Sinon, la méthode n'existe pas, donc je renvoi une erreur 404.
                $this->render('errors/404', ['erreur' => 'Aucune vue correspondante']);
                
            }
        
        } else {
            
            // -- Sinon, le fichier du controleur n'existe pas, donc je renvoi une erreur 404.
            $this->render('errors/404', ['erreur' => 'Aucun controleur correspondant']);
            
        }
        
        
    }
    
}








