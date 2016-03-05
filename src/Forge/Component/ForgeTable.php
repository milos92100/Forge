<?php
/**
 * Created by PhpStorm.
 * User: Milos
 * Date: 2/24/2016
 * Time: 12:02 AM
 */

namespace Forge\Component;



use Forge\Collection\ForgeFieldCollection;

/**
 * ForgeTable.
 *
 * @package Forge\Component
 * @author Miloš Danilov <milosdanilov@gmail.com>
 */
class ForgeTable
{
    /**
     * ForgeTable name.
     * @var string
     */
    private $name;

    /**
     * Collection of ForgeField objects.
     * @var ForgeFieldCollection
     */
    private $fields = null;

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param ForgeFieldCollection $fields
     */
    public function setFields(ForgeFieldCollection $fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return ForgeFieldCollection
     */
    public function getFields()
    {
        return $this->fields;
    }
}