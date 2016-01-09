<?php


namespace Forge;

use Forge\Common\Collection;
use Forge\Data\Data;


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
     * @var Data $data
     */
    protected $data = null;

    /**
     * @var Config $config
     */
    protected $config = null;


    public function __construct(Config $config)
    {
        $this->data = Data::getInstance();
        $this->config = $config;
    }


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

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


}