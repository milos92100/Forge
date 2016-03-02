<?php
/**
 * Created by PhpStorm.
 * User: Milos
 * Date: 2/24/2016
 * Time: 7:30 PM
 */

ini_set("display_errors", "1");
require 'bootstrap.php';

$config = \Forge\Factory\ConfigFactory::getConfig();

$forge = new \Forge\Forge($config);
$forge->smith();