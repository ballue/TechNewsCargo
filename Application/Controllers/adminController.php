<?php
namespace Application\Controllers;

use Application\Models\Db\DBFactory;
use Application\Models\Db\ORM;

class adminController extends \Application\Controllers\appController
{
    public function connexion() {
        
        $this->render('admin/connexion');
    }
    
    public function inscription() {
    
        $this->render('admin/inscription');
    }
    
    public function addcategorie() {
        
        if($this->isPost()) {
            // -- Traitement POST
            // -- Récupération des Données
            $LIBELLECATEGORIE = $_POST['LIBELLECATEGORIE'];
            
            // -- Vérification des Données
            
            // -- Insertion en BDD
            DBFactory::start();
            $categorie = ORM::for_table('categorie')->create();
            $categorie->LIBELLECATEGORIE = $LIBELLECATEGORIE;
            $categorie->ROUTECATEGORIE   = 'news/'.strtolower($LIBELLECATEGORIE);
            $categorie->save();
            
            // -- Redirection
            $this->redirect(PUBLIC_URL);
        }
        
        $this->render('admin/categorie');
    }
}

