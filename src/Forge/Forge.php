<?php
/**
 * Created by PhpStorm.
 * User: milos
 * Date: 7.1.16.
 * Time: 22.56
 */

namespace Forge;


use Forge\Factory\ForgeDatabaseFactory;

class Forge
{

    private $config = null;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function smith()
    {
        $database = ForgeDatabaseFactory::getInstance()->create();


        $forgeTables = $database->getTables();

        echo " >> smith <br />";
        foreach($forgeTables as $table) {

            /* @var $table \Forge\Component\ForgeTable */
            echo "FORGE TABLE: {$table->getName()}<br />";

            foreach ($table->getFields() as $field) {
                var_dump($field);
            }
        }
    }

}