<?php
/**
 * Created by PhpStorm.
 * User: Milos
 * Date: 2/23/2016
 * Time: 8:49 PM
 */

namespace Forge\Factory;


use Forge\Collection\ForgeFieldCollection;
use Forge\Collection\ForgeTableCollection;
use Forge\Component\ForgeField;
use Forge\Component\ForgeTable;
use Forge\Config;
use Forge\Database\ForgeDatabase;
use Forge\iDatabaseReader;

/**
 * ForgeDatabaseFactory.
 *
 * @package Forge\Factory
 * @author Miloš Danilov <milosdanilov@gmail.com>
 */
class ForgeDatabaseFactory
{
    /**
     * Class instance.
     * @var ForgeDatabaseFactory
     */
    protected static $instance = null;


    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct()
    {
    }

    /**
     * Returns the instance.
     * @return ForgeDatabaseFactory
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Creates the Forge Virtual database.
     * It will load the whole database structure - table, fields.
     *
     * @param Config $config
     * @return ForgeDatabase
     * @throws \Forge\Exception\DatabaseNotSupportedException
     * @throws \Forge\Exception\DatabaseReaderNotSupportedException
     */
    public function createDatabase(Config $config)
    {
        $readerFactory = DatabaseReaderFactory::getReader($config);

        $fdb = new ForgeDatabase();
        $fTables = $this->createTables($readerFactory);

        $fdb->setTables($fTables);

        return $fdb;
    }

    /**
     * Helper method for creating the ForgeTableCollection from
     * the database structure that is read with the iDatabaseReader.
     *
     * Each ForgeTable contains the ForgeFieldCollection.
     *
     * TODO - move this to ForgeTableFactory?
     *
     * @param iDatabaseReader $reader
     * @return ForgeTableCollection
     * @throws \Forge\Exception\TableAlreadyInCollectionException
     */
    private function createTables(iDatabaseReader $reader)
    {
        $forgeTableCollection = new ForgeTableCollection();

        $table_names = $reader->getTableList();
        foreach ($table_names as $table_name) {

            $fTable = new ForgeTable();

            $fTable->setName($table_name);
            $fTable->setFields(
                $this->createFields($reader, $table_name)
            );

            $forgeTableCollection->addTable($fTable);
        }

        return $forgeTableCollection;
    }

    /**
     * Helper method for creating the ForgeFieldCollection for given table name.
     * Reading the table structure is done with iDatabaseReader.
     *
     * TODO - Move this to ForgeFieldFactory?
     *
     * @param iDatabaseReader $reader
     * @param string $table_name
     * @return ForgeFieldCollection
     * @throws \Forge\Exception\FieldAlreadyInCollectionException
     */
    private function createFields(iDatabaseReader $reader, $table_name)
    {
        $forgeFieldCollection = new ForgeFieldCollection();

        $fields = $reader->describeTable($table_name);
        foreach ($fields as $field) {

            $fField = new ForgeField();

            // TODO - maybe we need object of some sort for $field ?
            $fField->setName($field['name']);
            $fField->setType($field['type']);
            $fField->setKey($field['key']);

            $forgeFieldCollection->addField($fField);
        }

        return $forgeFieldCollection;
    }
}