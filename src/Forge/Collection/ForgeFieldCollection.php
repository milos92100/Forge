<?php
/**
 * Created by PhpStorm.
 * User: Miloš Danilov <milosdanilov@gmail.com>
 * Date: 2/25/2016
 * Time: 8:16 PM
 */

namespace Forge\Collection;


use Forge\Common\Collection;
use Forge\Component\ForgeField;
use Forge\Exception\FieldAlreadyInCollectionException;
use Forge\Exception\FieldNotInCollectionException;

/**
 * ForgeFieldCollection.
 *
 * @package Forge\Collection
 * @author Miloš Danilov <milosdanilov@gmail.com>
 */
class ForgeFieldCollection extends Collection
{

    /**
     * Adds a new ForgeField object to the collection.
     * If the field is already in collection
     * a FieldAlreadyInCollectionException will be thrown.
     *
     * @param ForgeField $field A field that will be added to collection
     * @throws FieldAlreadyInCollectionException
     */
    public function addField(ForgeField $field)
    {
        if ($this->exists($field->getName())) {
            throw new FieldAlreadyInCollectionException();
        }

        $this->add($field, $field->getName());
    }

    /**
     * Removes the given ForgeField from collection.
     * If the given field is not found in collection
     * a FieldNotInCollectionException will be thrown.
     *
     * @param ForgeField $field A field that will be removed from collection
     * @throws FieldNotInCollectionException
     */
    public function removeField(ForgeField $field)
    {
        if (!$this->exists($field->getName())) {
            throw new FieldNotInCollectionException($field);
        }

        $this->remove($field->getName());
    }

}