<?php
namespace Application\Models\Db;
use Application\Models\Db\DBFactory;

abstract class DbTable
{
    
    // -- Nom de la Table
    protected $_table;
    
    // -- Clé Primaire
    protected $_primary;
    
    // -- Class To Map
    protected $_classToMap;
    
    // -- Objet PDO, BDD
    private $_db;
    
    public function __construct() {
        $this->_db = DBFactory::PDOFactory();
    }
    
    /**
     * Fonction qui sera chargée de récupérer toutes les informations d'une table dans la BDD
     */
    public function fetchAll() {
        
        $sql = "SELECT * FROM ".$this->_table;
        $sth = $this->_db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_CLASS, $this->_classToMap);
    }
    
}
   
















