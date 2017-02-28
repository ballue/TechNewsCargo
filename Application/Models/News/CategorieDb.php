<?php
namespace Application\Models\News;

use Application\Models\Db\DbTable;

class CategorieDb extends DbTable
{
    protected $_table = 'categorie';
    protected $_primary = 'IDCATEGORIE';
    protected $_classToMap = __NAMESPACE__ . '\\Categorie';
}

