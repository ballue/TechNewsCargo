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
     * @return Collection d'Objets de la Classe Cible
     */
    public function fetchAll($where = '') {
        
        $sql = "SELECT * FROM ".$this->_table;
        
        if($where != '') {
            $sql .= ' WHERE '.$where;
        }
        
        $sth = $this->_db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_CLASS, $this->_classToMap);
    }
    
    /**
     * Récupère un Enregistrement dans la BDD pour l'ID et la Colonne passée en paramètres.
     * @param Entier $id ID de l'élément à récupérer dans la BDD
     * @param String $column Si différent de la Clé Primaire
     * @return Objet de la Classe Cible
     */
    public function fetchOne($id, $column = '') {
        
        if($column == '') {
            $column = $this->_primary;
        }
        
        $sth = $this->_db->prepare('SELECT * FROM '.$this->_table.' WHERE '.$column.' = :id');
        $sth->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $sth->execute();
        
        $sth->setFetchMode(\PDO::FETCH_CLASS, $this->_classToMap);
        return $sth->fetch();
    }
    
}
   
















