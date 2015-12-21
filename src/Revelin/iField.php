<?php

namespace Revelin;

/**
 * Created by PhpStorm.
 * User: milos
 * Date: 21.12.15.
 * Time: 00.57
 */

interface iField
{
    public function getName();

    public function getType();

    public function getAllowNull();

    public function getDefault();

    public function getKey();

}