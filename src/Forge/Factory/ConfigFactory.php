<?php


namespace Forge\Factory;

use Forge\Config;
use Forge\Exception\ConfigFileEmptyException;
use Forge\Exception\ConfigFileNotFoundException;
use Forge\Exception\ConfigFileNotReadableException;
use Exception;


/**
 * Created by PhpStorm.
 * User: milos
 * Date: 29.12.15.
 * Time: 23.23
 */
class ConfigFactory
{


    /**
     * @var Config
     */
    public static $config;


    /**
     * Returns the Config object with the configuration data.
     *
     * @param null $path
     * @return Config
     */
    public static function getConfig($path = null)
    {
        if (self::$config === null) {

            self::$config = self::createConfig($path);
        }

        return self::$config;
    }


    public static function reset()
    {
        self::$config = null;
    }


    /**
     *This method reads the conf file and creates a new Config object.
     *
     * @param null $path
     * @return Config This exception is thrown when the conf file has no content
     * @throws ConfigFileEmptyException This exception is thrown when the conf file has no content
     * @throws ConfigFileNotFoundException This exception is thrown when the conf file was not founds
     * @throws ConfigFileNotReadableException This exception is thrown when the conf file is not readable
     * @throws Exception
     */
    private static function createConfig($path = null)
    {

        $file = self::readConfigFile($path);

        $tempConfig = new Config();
        $tempConfig->setDbname($file->dbname);
        $tempConfig->setDbType($file->dbtype);
        $tempConfig->setHost($file->dbhost);
        $tempConfig->setUser($file->user);
        $tempConfig->setPassword($file->password);
        $tempConfig->setPort($file->port);
        $tempConfig->setDestinationPath($file->destination_path);

        $exclude_tables = $file->exclude_tables;
        if (isset($exclude_tables) and !is_array($exclude_tables)) {
            throw new Exception("Invalid configuration file.The 'exclude_tables' parameter must be an array");
        }
        $tempConfig->setExcludeTables($exclude_tables);

        return $tempConfig;

    }


    /**
     *
     * Reads the configuration file and returns the decoded json as a object.
     * It also performs checks about the existence of the file,
     * its readability and its content.
     *
     * @param null $path
     * @return Object
     * @throws ConfigFileEmptyException This exception is thrown when the conf file has no content
     * @throws ConfigFileNotFoundException This exception is thrown when the conf file was not founds
     * @throws ConfigFileNotReadableException This exception is thrown when the conf file is not readable
     * @internal param $pa
     */
    private static function readConfigFile($path = null)
    {


        if ($path === null) {
            $path = CONFIG_FILE_FULL_PATH;
        }


        if (!file_exists($path)) {
            throw new ConfigFileNotFoundException("Configuration file not found");
        }

        if (!is_readable($path)) {
            throw new ConfigFileNotReadableException("Configuration file not readable");
        }

        $content = file_get_contents($path);

        if (!$content or $content == "") {
            throw new ConfigFileEmptyException("Configuration file is empty");
        }

        return json_decode($content);

    }


}