<?php
/**
 * Created by PhpStorm.
 * User: milos
 * Date: 20.1.16.
 * Time: 19.24
 */

namespace Forge\Virtual;


use Forge\Common\ForgeTableCollection;

class ForgeDatabase
{

    /**
     * @var String
     */
    private $name;

    /**
     * @var ForgeTableCollection
     */
    private $tables;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return ForgeTableCollection
     */
    public function getTables()
    {
        return $this->tables;
    }

    /**
     * @param ForgeTableCollection $tables
     */
    public function setTables($tables)
    {
        $this->tables = $tables;
    }


}