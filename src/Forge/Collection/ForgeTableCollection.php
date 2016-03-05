<?php
/**
 * Created by PhpStorm.
 * User: Miloš Danilov
 * Date: 2/24/2016
 * Time: 12:17 AM
 */

namespace Forge\Collection;


use Forge\Common\Collection;
use Forge\Component\ForgeTable;
use Forge\Exception\TableAlreadyInCollectionException;
use Forge\Exception\TableNotInCollectionException;

class ForgeTableCollection extends Collection
{

    /**
     * Adds a new ForgeTable object to the collection.
     * If the given table is already in the collection
     * a TableAlreadyInCollectionException exception is thrown.
     *
     * @param ForgeTable $table The table that will be added to the collection
     * @throws TableAlreadyInCollectionException
     */
    public function addTable(ForgeTable $table)
    {
        if ($this->exists($table->getName())) {
            throw new TableAlreadyInCollectionException();
        }

        $this->add($table, $table->getName());
    }

    /**
     * This method removes the given ForgeTable from the collection.
     * If the given ForgeTable object is not found in the collection
     * an TableNotInCollectionException exception is thrown.
     *
     * @param ForgeTable $table
     * @throws TableNotInCollectionException
     */
    public function removeTable(ForgeTable $table)
    {
        if (!$this->exists($table->getName())) {
            throw new TableNotInCollectionException($table);
        }

        $this->remove($table->getName());
    }
}
