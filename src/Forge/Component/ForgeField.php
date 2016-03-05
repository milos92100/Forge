<?php
/**
 * Created by PhpStorm.
 * User: Miloš Danilov <milosdanilov@gmail.com>
 * Date: 2/25/2016
 * Time: 8:11 PM
 */

namespace Forge\Component;


/**
 * ForgeField.
 *
 * @package Forge\Component
 * @author Miloš Danilov <milosdanilov@gmail.com>
 */
class ForgeField
{
    /**
     * ForgeField name.
     * @var string
     */
    private $name;

    /**
     * Data type.
     * TODO - revise this
     * @var string
     */
    private $type;

    /**
     * Key type.
     * Can be PRIMARY, FOREIGN..
     * TODO - revise this
     * @var string
     */
    private $key;

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
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }
}