<?php


namespace Forge\Factory;

use Forge\Config;
use Forge\Exception\ConfigFileEmptyException;
use Forge\Exception\ConfigFileNotFoundException;
use Forge\Exception\ConfigFileNotReadableException;

/**
 * Created by PhpStorm.
 * User: milos
 * Date: 29.12.15.
 * Time: 23.23
 */
class ConfigFactory
{

    const ROOT_PATH = __DIR__ . "/";
    const CONFIG_FILE = "forge.json";

    /**
     * @var Config
     */
    public static $config;


    /**
     * Returns the Config object with the configuration data.
     *
     * @return Config
     */
    public static function getConfig()
    {
        if (self::$config === null) {

            self::$config = self::createConfig();
        }

        return self::$config;
    }


    /**
     *This method reads the conf file and creates a new Config object.
     *
     * @throws ConfigFileEmptyException        This exception is thrown when the conf file has no content
     * @throws ConfigFileNotFoundException     This exception is thrown when the conf file was not founds
     * @throws ConfigFileNotReadableException  This exception is thrown when the conf file is not readable
     *
     * @return Config  The configuration file
     */
    private static function createConfig()
    {

        $file = self::readConfigFile();

        $tempConfig = new Config();
        $tempConfig->setDbname($file->dbname);
        $tempConfig->setDbType($file->dbtype);
        $tempConfig->setHost($file->dbhost);
        $tempConfig->setUser($file->user);
        $tempConfig->setPassword($file->password);

        return $tempConfig;

    }


    /**
     *
     * Reads the configuration file and returns the decoded json as a object.
     * It also performs checks about the existence of the file,
     * its readability and its content.
     *
     * @return Object
     * @throws ConfigFileEmptyException       This exception is thrown when the conf file has no content
     * @throws ConfigFileNotFoundException    This exception is thrown when the conf file was not founds
     * @throws ConfigFileNotReadableException This exception is thrown when the conf file is not readable
     */
    private static function readConfigFile()
    {


        if (!file_exists(ROOT_PATH . CONFIG_FILE)) {
            throw new ConfigFileNotFoundException("Configuration file not found");
        }

        if (!is_readable()) {
            throw new ConfigFileNotReadableException("Configuration file not readable");
        }

        $content = file_get_contents(ROOT_PATH . CONFIG_FILE);


        if (!$content or $content == "") {
            throw new ConfigFileEmptyException("Configuration file is empty");
        }

        return json_decode($content);

    }


}