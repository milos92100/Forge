<?php


namespace Revelin;

use Revelin\Common\Collection;


/**
 * AbstractDatabase
 *
 * User: milos
 * Date: 21.12.15.
 * Time: 00.09
 *
 *
 */
abstract class AbstractDatabase implements iDatabase
{


    /**
     *
     * This variable represents a collection of db tables.
     *
     * @var Collection
     */
    protected $tables;

    /**
     * The database name.
     *
     * @var string
     */
    protected $name;


    /**
     * Returns the $tables collection.
     *
     * @return Collection
     */
    public function getTables()
    {

        //todo Implment lazy loading logic(maybe)
        return $this->tables;
    }

    /**
     * Sets the $tables collection.
     *
     * @param Collection $tables
     */
    public function setTables($tables)
    {
        $this->tables = $tables;
    }


}