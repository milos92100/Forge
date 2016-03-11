<?php

use Forge\DatabaseType;
use Forge\Config;
use Forge\Factory\DSNFactory;


/**
 * Created by PhpStorm.
 * User: milos
 * Date: 8.3.16.
 * Time: 23.59
 */
class DSNFactoryTest extends PHPUnit_Framework_TestCase
{

    /**
     * @param $type
     * @return Config
     */
    private function getConfigForTest($type)
    {
        return new Config($type, "localhost", "3306", "john",
            "123", "test", "path", array()
        );
    }

    /**
     * @throws \Forge\Exception\ConfigFileNotValid
     * @throws \Forge\Factory\DatabaseNotSupported
     *
     * @expectedException \Forge\Exception\ConfigFileNotValid
     * @expectedExceptionMessage The db name is not set
     */
    public function testGetDSNThrowsConfigFileNotValidException()
    {
        $config = $this->getConfigForTest(DatabaseType::MYSQL);
        $config->setDbname(null);

        DSNFactory::_getDSN($config);

    }

    /**
     * @throws \Forge\Exception\ConfigFileNotValid
     * @throws \Forge\Exception\DatabaseNotSupported
     *
     * @expectedException \Forge\Exception\DatabaseNotSupported
     * @expectedExceptionMessage Database error not supported.
     */
    public function testGetDSNThrowsDatabaseNotSupportedEsception()
    {
        $config = $this->getConfigForTest(DatabaseType::MYSQL);
        $config->setDbType("error");

        DSNFactory::_getDSN($config);
    }


    /**
     *
     * @throws \Forge\Exception\ConfigFileNotValid
     * @throws \Forge\Exception\DatabaseNotSupported
     *
     * @expectedException \Forge\Exception\DatabaseNotSupported
     * @expectedExceptionMessage Database test not supported.
     */
    public function testGetDSNThrowsDatabaseNotSupportedException()
    {
        $config = $this->getConfigForTest("test");

        DSNFactory::_getDSN($config);

    }

    /**
     *Tests the _getDSN for the mysql db type.
     *
     * @throws \Forge\Exception\ConfigFileNotValid
     * @throws \Forge\Factory\DatabaseNotSupported
     */
    public function testGetMySqlDSN()
    {
        $config = $this->getConfigForTest(DatabaseType::MYSQL);

        $dsn = DSNFactory::_getDSN($config);

        $this->assertEquals("mysql:host=" . $config->getHost() . ";dbname=" . $config->getDbname(), $dsn);

    }


    /**
     * @throws \Forge\Exception\ConfigFileNotValid
     * @throws \Forge\Exception\DatabaseNotSupported
     *
     * @expectedException \Forge\Exception\ConfigFileNotValid
     * @expectedExceptionMessage The host is not set
     */
    public function testGetMySqlDSNThrowsConfigFileNotValid()
    {
        $config = $this->getConfigForTest(DatabaseType::MYSQL);
        $config->setHost(null);

        $dsn = DSNFactory::_getDSN($config);
        $this->assertEquals("mysql:host=" . $config->getHost() . ";dbname=" . $config->getDbname(), $dsn);

    }

    /**
     * Tests the getMsSqlDSN method.
     *
     * @throws \Forge\Exception\ConfigFileNotValid
     * @throws \Forge\Exception\DatabaseNotSupported
     */
    public function  testGetMsSqlDSN()
    {
        $config = $this->getConfigForTest(DatabaseType::MSSQL);

        $dsn = DSNFactory::_getDSN($config);
        $this->assertEquals("dblib:host=" . $config->getHost() . ":" . $config->getPort() . ";dbname=" . $config->getDbname(), $dsn);

    }

    /**
     * @throws \Forge\Exception\ConfigFileNotValid
     * @throws \Forge\Exception\DatabaseNotSupported
     *
     * @expectedException \Forge\Exception\ConfigFileNotValid
     * @expectedExceptionMessage The host is not set
     */
    public function testGetMsSqlDSNThrowsConfigFileNotValidHostNotSet()
    {
        $config = $this->getConfigForTest(DatabaseType::MSSQL);
        $config->setHost(null);

        $dsn = DSNFactory::_getDSN($config);
        $this->assertEquals("dblib:host=" . $config->getHost() . ":" . $config->getPort() . ";dbname=" . $config->getDbname(), $dsn);

    }

    /**
     * @throws \Forge\Exception\ConfigFileNotValid
     * @throws \Forge\Exception\DatabaseNotSupported
     *
     * @expectedException \Forge\Exception\ConfigFileNotValid
     * @expectedExceptionMessage The port is not set
     */
    public function testGetMsSqlDSNThrowsConfigFileNotValidPortNotSet()
    {
        $config = $this->getConfigForTest(DatabaseType::MSSQL);
        $config->setPort(null);

        $dsn = DSNFactory::_getDSN($config);
        $this->assertEquals("dblib:host=" . $config->getHost() . ":" . $config->getPort() . ";dbname=" . $config->getDbname(), $dsn);

    }

    /**
     * @throws \Forge\Exception\ConfigFileNotValid
     * @throws \Forge\Exception\DatabaseNotSupported
     */
    public function testGetOracleDSN()
    {
        $config = $this->getConfigForTest(DatabaseType::ORACLE);

        $dsn = DSNFactory::_getDSN($config);
        $this->assertEquals("oci:" . $config->getDbname() . "", $dsn);

    }

    /**
     * @throws \Forge\Exception\ConfigFileNotValid
     * @throws \Forge\Exception\DatabaseNotSupported
     */
    public function testGetPostgreSqlDSN()
    {
        $config = $this->getConfigForTest(DatabaseType::POSTGRESQL);

        $dsn = DSNFactory::_getDSN($config);
        $this->assertEquals("pgsql:dbname=" . $config->getDbname() . ";host=" . $config->getHost(), $dsn);
    }

    /**
     * @throws \Forge\Exception\ConfigFileNotValid
     * @throws \Forge\Exception\DatabaseNotSupported
     *
     * @expectedException \Forge\Exception\ConfigFileNotValid
     * @expectedExceptionMessage The host is not set
     */
    public function testGetPostgreSqlThrowsConfigFileNotValidException()
    {
        $config = $this->getConfigForTest(DatabaseType::POSTGRESQL);
        $config->setHost(null);

        $dsn = DSNFactory::_getDSN($config);
    }
}
