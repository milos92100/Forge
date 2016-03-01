<?php
/**
 * Created by PhpStorm.
 * User: milos
 * Date: 29.2.16.
 * Time: 01.09
 */

namespace Forge\Exception;


use Forge\Virtual\ForgeTable;

class TableNotInCollectionException extends \Exception
{

    public function __construct(ForgeTable $table = null)
    {

        if ($table == null) {
            $message = "The given table is not found";
        } else {
            $message = "The given table " . $table->getName() . " is not found";
        }


        parent::__construct($message);
    }

}