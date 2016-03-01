<?php

use Forge\Virtual\ForgeTable;
use Forge\Common\ForgeTableCollection;

/**
 * Created by PhpStorm.
 * User: milos
 * Date: 1.3.16.
 * Time: 21.31
 */
class ForgeTableCollectionTest extends PHPUnit_Framework_TestCase
{

    private $table_name = "test_table";

    private function getCollectionWithSingleTable()
    {
        $collection = new ForgeTableCollection();

        $collection->addTable($this->getTable());

        return $collection;
    }

    private function getTable()
    {
        $table = new ForgeTable();
        $table->setName($this->table_name);

        return $table;

    }

    /**
     * Tests the addTable method.
     *
     * @throws \Forge\Exception\TableAlreadyInCollectionException
     */
    public function testAddTable()
    {
        $collection = $this->getCollectionWithSingleTable();

        $this->assertInstanceOf(ForgeTable::class, $collection->get($this->table_name));
    }

    /**
     * @expectedException \Forge\Exception\TableAlreadyInCollectionException
     */
    public function testTableAlreadyInCollectionExceptionException()
    {
        $collection = $this->getCollectionWithSingleTable();

        $collection->addTable($this->getTable());
    }


    /**
     * Tests the removeTable method
     *
     * @throws \Forge\Exception\TableAlreadyInCollectionException
     * @throws \Forge\Exception\TableNotInCollectionException
     */
    public function testRemoveTable()
    {
        $collection = $this->getCollectionWithSingleTable();

        $collection->removeTable($this->getTable());

        $this->assertEquals(false, $collection->get($this->table_name));
    }

    /**
     * @expectedException \Forge\Exception\TableNotInCollectionException
     */
    public function  testTableNotInCollectionException()
    {
        $collection = $this->getCollectionWithSingleTable();

        $table2 = new ForgeTable();
        $table2->setName("test_table2");

        $collection->removeTable($table2);
    }


}