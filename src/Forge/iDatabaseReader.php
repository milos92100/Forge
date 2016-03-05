<?php
/**
 * Created by PhpStorm.
 * User: Miloš Danilov <milosdanilov@gmail.com>
 * Date: 3/3/2016
 * Time: 10:07 PM
 */

namespace Forge;


/**
 * Interface iDatabaseReader
 * @package Forge
 */
interface iDatabaseReader
{
    /**
     * Returns the list of tables names in database.
     *
     * @return array
     */
    function getTableList();

    /**
     * Describes the Table structure for given table name.
     *
     * @param string $table
     * @return array
     */
    function describeTable($table);
}