<?php

namespace Forge\Factory;

use Forge\Config;
use Forge\Exception\ConfigFileNotValid;
use Forge\DatabaseType;
use Forge\Factory\ConfigFactory;
use Forge\Exception\DatabaseNotSupported;


/**
 * Created by PhpStorm.
 * User: milos
 * Date: 3.1.16.
 * Time: 21.49
 */
class DSNFactory
{

    public static function getDSN()
    {
        $config = ConfigFactory::getConfig();

        return self::_getDSN($config);
    }


    public static function _getDSN(Config $config)
    {
        if (!$config->getDbname()) {
            throw new ConfigFileNotValid("The db name is not set");
        }

        switch ($config->getDbType()) {
            case DatabaseType::MYSQL:
                return self::getMySql($config);

            case DatabaseType::DB2:
                throw new DatabaseNotSupported("Database " . $config->getDbType() . " not supported.");

            case DatabaseType::ORACLE:
                return self::getOracle($config);

            case DatabaseType::POSTGRESQL:
                return self::getPostgreSql($config);

            case DatabaseType::MSSQL:
                return self::getMsSql($config);

            case DatabaseType::SQLITE:
                throw new DatabaseNotSupported("Database " . $config->getDbType() . " not supported.");

            default:
                throw new DatabaseNotSupported("Database " . $config->getDbType() . " not supported.");


        }


    }

    /**
     * @param Config $config
     * @return string
     * @throws ConfigFileNotValid
     */
    private static function getMySql(Config $config)
    {
        if (!$config->getHost()) {
            throw new ConfigFileNotValid("The host is not set");
        }

        return "mysql:host=" . $config->getHost() . ";dbname=" . $config->getDbname();
    }

    /**
     * @param Config $config
     * @return string
     * @throws ConfigFileNotValid
     */
    private static function getMsSql(Config $config)
    {
        if (!$config->getHost()) {
            throw new ConfigFileNotValid("The host is not set");
        }

        if (!$config->getPort()) {
            throw new ConfigFileNotValid("The port is not set");
        }

        return "dblib:host=" . $config->getHost() . ":" . $config->getPort() . ";dbname=" . $config->getDbname();
    }

    /**
     * @param Config $config
     * @return string
     */
    private static function getOracle(Config $config)
    {
        return "oci:" . $config->getDbname() . "";
    }

    /**
     * @param Config $config
     * @return string
     * @throws ConfigFileNotValid
     */
    private static function getPostgreSql(Config $config)
    {
        if (!$config->getHost()) {
            throw new ConfigFileNotValid("The host is not set");
        }

        return "pgsql:dbname=" . $config->getDbname() . ";host=" . $config->getHost();

    }


}