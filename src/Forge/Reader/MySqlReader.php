<?php
namespace Forge\Reader;

use Forge\Exception\DatabaseTablesException;
use Forge\ForgeComponent;

/**
 * MySqlDatabase
 * User: milos
 * Date: 21.12.15 .
 * Time: 00.06
 */
class MySqlReader extends ForgeComponent
{

    const GET_TABLES_QUERY = "SHOW TABLES";

    const TABLES_NAME_KEY = "Tables_in_";

    public function populateTables()
    {
        $tables = $this->getTableNames();


    }

    private function getTableNames()
    {
        $tables = array();

        $stmt = $this->data->query(self::GET_TABLES_QUERY);

        if (!$stmt) {
            throw new DatabaseTablesException("Error code : " . $stmt->errorCode());
        }

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tables[] = $row[$this->getTableNameKey()];
        }

        return $tables;
    }

    private function getTableNameKey()
    {
        return self::TABLES_NAME_KEY . $this->config->getDbname();
    }

}