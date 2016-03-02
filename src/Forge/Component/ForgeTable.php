<?php
/**
 * Created by PhpStorm.
 * User: Milos
 * Date: 2/24/2016
 * Time: 12:02 AM
 */

namespace Forge\Component;



use Forge\Collection\ForgeFieldCollection;

class ForgeTable
{
    private $name;

    /**
     * @var ForgeFieldCollection
     */
    private $fields = null;

    public function addField(ForgeField $forgeField)
    {
        if (null === $this->fields) {
            $this->fields = new ForgeFieldCollection();
        }

        $this->fields->add($forgeField);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFields()
    {
        return $this->fields->getAllItems();
    }
}