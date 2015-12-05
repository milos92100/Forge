<?php
namespace src\Database;

/**
 *
 * @author milos
 *        
 */
class REB_Table
{

    private $tableName;

    public function __construct ($tableName)
    {
        $this->tableName = $tableName;
    }
}