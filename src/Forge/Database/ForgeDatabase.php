<?php
/**
 * Created by PhpStorm.
 * User: Milos
 * Date: 2/23/2016
 * Time: 8:58 PM
 */

namespace Forge\Database;


use Forge\Collection\ForgeTableCollection;
use Forge\Component\ForgeTable;

class ForgeDatabase
{
    /**
     * Collection of ForgeTable objects.
     * @var ForgeTableCollection
     */
    private $tables = null;

    /**
     * Returns the collection of ForgeTable objects.
     * @return ForgeTableCollection
     */
    public function getTables()
    {
        return $this->tables;
    }

    /**
     * Sets the given ForgeTableCollection to Forge database.
     * @param ForgeTableCollection $tables
     */
    public function setTables(ForgeTableCollection $tables)
    {
        $this->tables = $tables;
    }
}