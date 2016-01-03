<?php

use Forge\Factory\ConfigFactory;


/**
 * Created by PhpStorm.
 * User: milos
 * Date: 3.1.16.
 * Time: 13.06
 */
class ConfigFactoryTest extends PHPUnit_Framework_TestCase
{

    const DB_HOST = "dbhost1";
    const DB_TYPE = "dbtype1";
    const PORT = "port1";
    const DB_NAME = "dbname1";
    const USER = "user1";
    const PASSWORD = "pass1";
    const DESTINATION_PATH = "dest1";
    const TABLE1 = "table1";
    const TABLE2 = "table2";

    const TEST_FILE = "/config_test_files/forgetest.json";
    const TEST_WRONG_FILE = "/config_test_files/wrongfile.json";
    const TEST_EMPTY_FILE = "/config_test_files/emptyfile.json";


    public function testCreateConfig()
    {
        ConfigFactory::reset();
        $config = ConfigFactory::getConfig(__DIR__ . self::TEST_FILE);

        $this->assertEquals(self::DB_HOST, $config->getHost());
        $this->assertEquals(self::DB_TYPE, $config->getDbType());
        $this->assertEquals(self::PORT, $config->getPort());
        $this->assertEquals(self::DB_NAME, $config->getDbname());
        $this->assertEquals(self::USER, $config->getUser());
        $this->assertEquals(self::PASSWORD, $config->getPassword());
        $this->assertEquals(self::DESTINATION_PATH, $config->getDestinationPath());

        $tables = $config->getExcludeTables();

        $this->assertEquals(self::TABLE1, $tables[0]);
        $this->assertEquals(self::TABLE2, $tables[1]);


    }

    /**
     * @expectedException \Forge\Exception\ConfigFileNotFoundException
     */
    public function testThrowsConfigFileNotFoundException()
    {
        ConfigFactory::reset();
        ConfigFactory::getConfig(__DIR__ . self::TEST_WRONG_FILE);

    }

    /**
     * @expectedException \Forge\Exception\ConfigFileEmptyException
     */
    public function testThrowsConfigFileEmptyException()
    {
        ConfigFactory::reset();
        ConfigFactory::getConfig(__DIR__ . self::TEST_EMPTY_FILE);
    }


}