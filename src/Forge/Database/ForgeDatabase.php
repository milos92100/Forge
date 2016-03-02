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
     * @var ForgeTableCollection
     */
    private $fTables = null;

    public function getTables()
    {
        return $this->fTables->getAllItems();
    }

    public function addTable(ForgeTable $fTable)
    {
        if (null === $this->fTables) {
            $this->fTables = new ForgeTableCollection();
        }

        $this->fTables->add($fTable);
    }
}