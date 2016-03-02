<?php
/**
 * Created by PhpStorm.
 * User: Milos
 * Date: 2/23/2016
 * Time: 9:04 PM
 */

namespace Forge\Reader;


use Forge\Data\Data;

abstract class AbstractDatabaseReader
{

    protected $dbAdapter = null;

    protected function getDbAdapter()
    {
        if (null === $this->dbAdapter) {
           $this->dbAdapter = Data::getInstance();
        }

        return $this->dbAdapter;
    }

    protected abstract function getTableList();

    protected abstract function describeTable($table);
}