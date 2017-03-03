<?php
namespace Application\Models\Db;
use Application\Models\Db\ORM;
use PDO;

/* --
 * Le fait de déclarer des propriétés ou des méthodes comme 
 * statiques vous permet d'y accéder sans avoir besoin d'instancier 
 * la classe. On ne peut accéder à une propriété déclarée comme statique 
 * avec l'objet instancié d'une classe (bien que ce soit possible pour 
 * une méthode statique).
 * Docs : http://php.net/manual/fr/language.oop5.static.php
 */
class DBFactory
{
    public static function PDOFactory() {
        
        // -- Création d'une Connexion PDO
        $pdo = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME, DBUSERNAME, DBPASSWORD);
        
        // : http://php.net/manual/fr/pdo.error-handling.php
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $pdo;
    }
    
    public static function start() {
        // -- Initialisation de Idiorm
        ORM::configure('mysql:host='.DBHOST.';dbname='.DBNAME);
        ORM::configure('username', DBUSERNAME);
        ORM::configure('password', DBPASSWORD);

        // -- Configuration de la clé primaire de chaque table
        // : Cette configuration n'est nécessaire que si les clé primaires sont différentes de 'id'
        ORM::configure('id_column_overrides', array(
            'article'       => 'IDARTICLE',
            'auteur'        => 'IDAUTEUR',
            'categorie'     => 'IDCATEGORIE',
            'tags'          => 'IDTAGS',
            'view_articles' => 'IDARTICLE',
            'view_tags'     => 'IDARTICLE'
        ));
    }
    
}

















