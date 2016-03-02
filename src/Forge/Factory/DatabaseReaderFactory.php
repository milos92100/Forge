<?php
/**
 * Created by PhpStorm.
 * User: Milos
 * Date: 2/24/2016
 * Time: 6:36 PM
 */

namespace Forge\Factory;


use Forge\Config;
use Forge\DatabaseType;
use Forge\Exception\DatabaseNotSupported;
use Forge\Exception\DatabaseReaderNotSupportedException;
use Forge\Reader\MySQLDatabaseReader;

class DatabaseReaderFactory
{

    public static function getReader(Config $config)
    {
        if (!self::isSupported($config->getDbType())) {
            throw new DatabaseNotSupported("Database type {$config->getDbType()} not supported!");
        }

        switch ($config->getDbType()) {
            case DatabaseType::MYSQL:
                return new MySQLDatabaseReader();

            case DatabaseType::SQLITE:
            case DatabaseType::DB2:
            case DatabaseType::MSSQL:
            case DatabaseType::ORACLE:
            case DatabaseType::POSTGRESQL:
            default:
                throw new DatabaseReaderNotSupportedException("Reader {$config->getDbType()} not implemented!");
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

}