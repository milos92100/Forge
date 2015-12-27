<?php

namespace Forge\Factory;

use Forge\Config;
use Forge\Exception\DatabaseNotSupported;
use Forge\iDatabase;

/**
 * Created by PhpStorm.
 * User: milos
 * Date: 21.12.15.
 * Time: 00.12
 */
class DatabaseFactory
{


    /**
     * @param Config $config
     * @return iDatabase
     * @throws DatabaseNotSupported
     */
    public static function createDatabase(Config $config)
    {
        switch ($config->getDbType()) {

            case Config::MYSQL:
                return self::createMySqlDatabase($config);

            case Config::DB2:
                throw new DatabaseNotSupported("Database " . $config->getDbType() . " not supported.");

            case Config::MONGODB:
                throw new DatabaseNotSupported("Database " . $config->getDbType() . " not supported.");

            case Config::ORACLE:
                throw new DatabaseNotSupported("Database " . $config->getDbType() . " not supported.");

            case Config::POSTGRESQL:
                throw new DatabaseNotSupported("Database " . $config->getDbType() . " not supported.");

            case Config::MSSQL:
                throw new DatabaseNotSupported("Database " . $config->getDbType() . " not supported.");

            case Config::SQLITE:
                throw new DatabaseNotSupported("Database " . $config->getDbType() . " not supported.");

            default:
                throw new DatabaseNotSupported("Database " . $config->getDbType() . " not supported.");

        }


    }

    private static function createMySqlDatabase(Config $config)
    {


        return 0;

    }

}