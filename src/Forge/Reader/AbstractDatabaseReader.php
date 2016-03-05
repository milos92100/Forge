<?php
/**
 * Created by PhpStorm.
 * User: Milos
 * Date: 2/23/2016
 * Time: 9:04 PM
 */

namespace Forge\Reader;


use Forge\Data\Data;
use Forge\iDatabaseReader;

/**
 * AbstractDatabaseReader.
 *
 * @package Forge\Reader
 * @author Miloš Danilov <milosdanilov@gmail.com>
 */
abstract class AbstractDatabaseReader implements iDatabaseReader
{

    /**
     * Database adapter.
     * @var Data
     */
    protected $dbAdapter = null;

    /**
     * Returns the database adapter.
     *
     * @return Data
     */
    protected function getDbAdapter()
    {
        if (null === $this->dbAdapter) {
           $this->dbAdapter = Data::getInstance();
        }

        return $this->dbAdapter;
    }
}