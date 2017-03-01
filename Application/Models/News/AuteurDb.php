<?php
namespace Application\Models\News;

use Application\Models\Db\DbTable;

class AuteurDb extends DbTable
{
    protected $_table = 'auteur';
    protected $_primary = 'IDAUTEUR';
    protected $_classToMap = __NAMESPACE__ . '\\Auteur';
}

