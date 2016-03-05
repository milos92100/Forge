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
        $database = ForgeDatabaseFactory::getInstance()->createDatabase($this->config);


        $forgeTablesCol = $database->getTables();

        echo " >> smith <br />";

        $iterator = $forgeTablesCol->getIterator();
        while($iterator->valid()) {

            $table = $iterator->current();

            /* @var $table \Forge\Component\ForgeTable */
            echo "FORGE TABLE: {$table->getName()}<br />";

            $fieldsCol = $table->getFields();
            foreach ($fieldsCol->keys() as $field_key) {
                var_dump($fieldsCol->get($field_key));
            }

            $iterator->next();
        }
    }

}