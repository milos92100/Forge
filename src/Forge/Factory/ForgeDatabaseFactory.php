<?php
/**
 * Created by PhpStorm.
 * User: Milos
 * Date: 2/23/2016
 * Time: 8:49 PM
 */

namespace Forge\Factory;


use Forge\Component\ForgeField;
use Forge\Component\ForgeTable;
use Forge\Database\ForgeDatabase;

class ForgeDatabaseFactory
{
    protected static $instance = null;

    protected function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function create()
    {
        $fdb = new ForgeDatabase();
        $this->fill($fdb);

        return $fdb;
    }

    private function fill(ForgeDatabase $forgeDatabase)
    {
        $readerFactory = DatabaseReaderFactory::getReader(
            ConfigFactory::getConfig()
        );

        $table_list = $readerFactory->getTableList();

        foreach ($table_list as $table_name) {

            $fTable = new ForgeTable();
            $fTable->setName($table_name);

            $fields = $readerFactory->describeTable($table_name);

            foreach ($fields as $field) {

                $fField = new ForgeField();
                $fField->setName($field['name']);
                $fField->setType($field['type']);
                $fField->setKey($field['key']);

                $fTable->addField($fField);
            }

            $forgeDatabase->addTable($fTable);
        }
    }
}