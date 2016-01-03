<?php

use Forge\Config;

/**
 * Created by PhpStorm.
 * User: milos
 * Date: 3.1.16.
 * Time: 17.24
 */
class ConfigTest extends PHPUnit_Framework_TestCase
{

    public function testInitConfigWithConstructor()
    {
        $config = new Config("mysql", "localhost", "8080", "smith", "password1234", "some_db", "some_dir", array("table1", "table2"));


        $this->assertEquals("mysql", $config->getDbType());
        $this->assertEquals("localhost", $config->getHost());
        $this->assertEquals("8080", $config->getPort());
        $this->assertEquals("smith", $config->getUser());
        $this->assertEquals("password1234", $config->getPassword());
        $this->assertEquals("some_db", $config->getDbname());
        $this->assertEquals("some_dir", $config->getDestinationPath());

        $this->assertCount(2, $config->getExcludeTables());

    }

    public function testInitConfigWithSetters()
    {

        $config = new Config();
        $config->setDbType("mysql");
        $config->setHost("localhost");
        $config->setPort("8080");
        $config->setUser("smith");
        $config->setPassword("password1234");
        $config->setDbname("some_db");

        $config->setDestinationPath("some_dir");

        $temp = array("table1", "table2");
        $config->setExcludeTables($temp);

        $this->assertEquals("mysql", $config->getDbType());
        $this->assertEquals("localhost", $config->getHost());
        $this->assertEquals("8080", $config->getPort());
        $this->assertEquals("smith", $config->getUser());
        $this->assertEquals("password1234", $config->getPassword());
        $this->assertEquals("some_db", $config->getDbname());
        $this->assertEquals("some_dir", $config->getDestinationPath());

        $this->assertCount(2, $config->getExcludeTables());

    }


}