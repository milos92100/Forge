<?php
/**
 * Created by PhpStorm.
 * User: milos
 * Date: 20.1.16.
 * Time: 19.22
 */

namespace Forge\Virtual;


class ForgeTable
{

    private $name;

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


}