<?php

use Forge\Factory\ForgeDatabaseFactory;

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
        $supported = ForgeDatabaseFactory::isSupported("foo");
        $this->assertEquals(false, $supported);

    }

}