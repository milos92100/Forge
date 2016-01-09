<?php
/**
 * Created by PhpStorm.
 * User: milos
 * Date: 7.1.16.
 * Time: 22.56
 */

namespace Forge;


use Forge\Factory\DatabaseFactory;

class Forge
{

    private $config = null;
    private $database = null;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }


    public function beginSmith()
    {

        $this->database = DatabaseFactory::createDatabase($this->config);



    }




}