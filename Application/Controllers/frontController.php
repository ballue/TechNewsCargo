<?php

namespace Application\Controllers; 

class frontController {
    
    public function __construct($params) {
        
        //print_r($params);
        if(empty($params)) {
            $params['controller']   = 'news';
            $params['action']       = 'index';
        }
        
        // -- Récupération des paramètres
        $controller = $params['controller'];
        $action     = $params['action'];
        
    }
    
}