<?php
/**
 * Created by PhpStorm.
 * User: Miloš Danilov <milosdanilov@gmail.com>
 * Date: 3/3/2016
 * Time: 9:28 PM
 */

namespace Forge\Exception;


use Forge\Component\ForgeTable;

class TableNotInCollectionException extends \Exception
{
    public function __construct(ForgeTable $table = null)
    {
        if ($table == null) {
            $message = "The given table is not found";
        } else {
            $message = "The given table ".$table->getName()." is not found";
        }
        parent::__construct($message);
    }
}