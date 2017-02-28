<?php
namespace Application\Models\Db;
use PDO;

class DBFactory
{
    public static function PDOFactory() {
        
        // -- Création d'une Connexion PDO
        $pdo = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME, DBUSERNAME, DBPASSWORD);
        
        // : http://php.net/manual/fr/pdo.error-handling.php
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $pdo;
    }
}

