<?php
namespace Application\Models\News;

use Application\Models\Db\DbTable;

class ArticleDb extends DbTable
{
    protected $_table = 'article';
    protected $_primary = 'IDARTICLE';
    protected $_classToMap = __NAMESPACE__ . '\\Article';
}

