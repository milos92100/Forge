<?php

use Forge\Factory\DatabaseFactory;

/**
 * Created by PhpStorm.
 * User: milos
 * Date: 3.1.16.
 * Time: 16.44
 */
class DatabaseFactoryTest extends PHPUnit_Framework_TestCase
{
    public function testIsNotSupported()
    {
        $supported = DatabaseFactory::isSupported("foo");
        $this->assertEquals(false, $supported);

    }

}