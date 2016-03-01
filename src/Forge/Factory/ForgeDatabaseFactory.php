<?php

namespace Forge\Factory;

use Forge\Reader\MySqlDatabase;
use Forge\DatabaseType;
use Forge\Exception\DatabaseNotSupported;
use Forge\ForgeComponent;
use Forge\iDatabase;
use Forge\Virtual\ForgeDatabase;

/**
 * Created by PhpStorm.
 * User: milos
 * Date: 21.12.15.
 * Time: 00.12
 */
class ForgeDatabaseFactory extends ForgeComponent
{


    /**
     *
     * @return iDatabase
     * @throws DatabaseNotSupported
     */
    public function createDatabase()
    {


        switch ($this->config->getDbType()) {

            case DatabaseType::MYSQL:
                return self::createFromMySqlDatabase();

            case DatabaseType::DB2:
                throw new DatabaseNotSupported("Database " . $this->config->getDbType() . " not supported.");

            case DatabaseType::MONGODB:
                throw new DatabaseNotSupported("Database " . $this->config->getDbType() . " not supported.");

            case DatabaseType::ORACLE:
                throw new DatabaseNotSupported("Database " . $this->config->getDbType() . " not supported.");

            case DatabaseType::POSTGRESQL:
                throw new DatabaseNotSupported("Database " . $this->config->getDbType() . " not supported.");

            case DatabaseType::MSSQL:
                throw new DatabaseNotSupported("Database " . $this->config->getDbType() . " not supported.");

            case DatabaseType::SQLITE:
                throw new DatabaseNotSupported("Database " . $this->config->getDbType() . " not supported.");

            default:
                throw new DatabaseNotSupported("Database " . $this->config->getDbType() . " not supported.");

        }


    }

    /**
     * Checks if the given db type is supported,
     * if its supported it returns true,
     * else it returns false.
     *
     * @param $type
     * @return bool
     */
    public static function isSupported($type)
    {
        foreach (DatabaseType::$SUPPORTED_DATABASES as $db_type) {
            if ($db_type === $type) {
                return true;
            }
        }
        return false;
    }

    private function createFromMySqlDatabase()
    {
        $forgeDatabase = new ForgeDatabase();
        $forgeDatabase->setName($this->config->getDbname());


    }

}