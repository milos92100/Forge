<?php

namespace Forge\Data;

use Forge\Factory\ConfigFactory;
use Forge\Factory\DSNFactory;
use PDO;

/**
 * Created by PhpStorm.
 * User: milos
 * Date: 29.12.15.
 * Time: 22.16
 */
class Data extends PDO
{

    protected static $instance = null;


    public function __construct($dsn = null, $username = null, $passwd = null, $options = null)
    {
        if ($dsn === null)
            $dsn = DSNFactory::getDSN();

        if ($username === null)
            $username = ConfigFactory::getConfig()->getUser();

        if ($passwd === null)
            $passwd = ConfigFactory::getConfig()->getPassword();

        parent::__construct($dsn, $username, $passwd);
    }


    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}