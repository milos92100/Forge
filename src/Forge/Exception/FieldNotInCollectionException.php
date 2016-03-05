<?php
/**
 * Created by PhpStorm.
 * User: Miloš Danilov <milosdanilov@gmail.com>
 * Date: 3/3/2016
 * Time: 10:00 PM
 */

namespace Forge\Exception;


use Forge\Component\ForgeField;

class FieldNotInCollectionException extends \Exception
{
    public function __construct(ForgeField $field = null)
    {
        if ($field == null) {
            $message = "The given field is not found";
        } else {
            $message = "The given field ".$field->getName()." is not found";
        }
        parent::__construct($message);
    }
}