<?php
namespace Application\Models\News;

use Application\Models\News\CategorieDb;
use Application\Models\News\AuteurDb;

class Article
{
    private $IDARTICLE,
            $IDAUTEUR,
            $IDCATEGORIE,
            $TITREARTICLE,
            $CONTENUARTICLE,
            $FEATUREDIMAGEARTICLE,
            $SPECIALARTICLE,
            $SPOTLIGHTARTICLE,
            $DATECREATIONARTICLE,
            $CategorieObj,
            $AuteurObj;
    
    public function __construct() {
        
        // -- L'Appel au Constructeur se fait de façon automatique par la classe PDO
        // -- A chaque "construction" nous allons récupérer des informations.
        
        $CategorieDb = new CategorieDb();
        $this->CategorieObj = $CategorieDb->fetchOne($this->IDCATEGORIE);
        
        $AuteurDb = new AuteurDb();
        $this->AuteurObj = $AuteurDb->fetchOne($this->IDAUTEUR);
        
    }
            
    // -- Getters

    /**
     * @return the $IDARTICLE
     */
    public function getIDARTICLE()
    {
        return $this->IDARTICLE;
    }

    /**
     * @return the $IDAUTEUR
     */
    public function getIDAUTEUR()
    {
        return $this->IDAUTEUR;
    }

    /**
     * @return the $IDCATEGORIE
     */
    public function getIDCATEGORIE()
    {
        return $this->IDCATEGORIE;
    }

    /**
     * @return the $TITREARTICLE
     */
    public function getTITREARTICLE()
    {
        return $this->TITREARTICLE;
    }

    /**
     * @return the $CONTENUARTICLE
     */
    public function getCONTENUARTICLE()
    {
        return $this->CONTENUARTICLE;
    }

    /**
     * @return the $FEATUREDIMAGEARTICLE
     */
    public function getFEATUREDIMAGEARTICLE()
    {
        return $this->FEATUREDIMAGEARTICLE;
    }

    /**
     * @return the $SPECIALARTICLE
     */
    public function getSPECIALARTICLE()
    {
        return $this->SPECIALARTICLE;
    }

    /**
     * @return the $SPOTLIGHTARTICLE
     */
    public function getSPOTLIGHTARTICLE()
    {
        return $this->SPOTLIGHTARTICLE;
    }

    /**
     * @return the $DATECREATIONARTICLE
     */
    public function getDATECREATIONARTICLE()
    {
        return $this->DATECREATIONARTICLE;
    }
    
    /**
     * @return the $CategorieObj
     */
    public function getCategorieObj()
    {
        return $this->CategorieObj;
    }
    
    /**
     * @return the $AuteurObj
     */
    public function getAuteurObj()
    {
        return $this->AuteurObj;
    }
    
    /**
     * Retourne une Accroche de 170 Caractères...
     */
    public function getAccroche() {
        
        // : http://php.net/manual/fr/function.mb-strimwidth.php
        
        // strip tags to avoid breaking any html
        $string = strip_tags($this->getCONTENUARTICLE());
        
        if (strlen($string) > 170) {
        
            // truncate string
            $stringCut = substr($string, 0, 170);
        
            // make sure it ends in a word so assassinate doesn't become ass...
            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
        }
        return $string;
    }
            
}























