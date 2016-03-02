<?php
/**
 * Created by PhpStorm.
 * User: Milos
 * Date: 2/23/2016
 * Time: 9:14 PM
 */

namespace Forge\Reader;


use Forge\Factory\ConfigFactory;

class MySQLDatabaseReader extends AbstractDatabaseReader
{

    public function getTableList()
    {
        $query = "SHOW TABLES";

        $stmt = $this->getDbAdapter()->query($query);

        $table_list = array();
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $table_list[] = $row['Tables_in_'.ConfigFactory::getConfig()->getDbname()];
        }

        return $table_list;
    }

    public function describeTable($table)
    {
        $query = "DESCRIBE {$table}";

        $stmt = $this->getDbAdapter()->query($query);

        $table_structure = array();
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {

            $tmp = array();
            $tmp['name'] = $row['Field'];
            $tmp['type'] = $row['Type'];
            $tmp['key'] = $row['Key'];

            $table_structure[] = $tmp;
        }

        return $table_structure;
    }
}