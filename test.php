<?php

ini_set("display_errors", "1");
require 'vendor/autoload.php';

use Revelin\MyTest;
use Revelin\Common\Collection;


$milos = new MyTest();
$milos->milos();

$coll = new Collection();




exit();

$link = mysql_connect("localhost", "root", "milos");
mysql_select_db("chatsky", $link);

$query = "SHOW TABLES";
$res = mysql_query($query, $link);

$tables = array();


echo "dasdasd";


while ($row = mysql_fetch_assoc($res)) {

    $tables[] = array_values($row);
}

// var_dump($tables);

$data = array();

foreach ($tables as $table => $val) {

    foreach ($val as $a => $v) {

        $query = "DESCRIBE " . $v;
        $res = mysql_query($query, $link);

        while ($row = mysql_fetch_object($res)) {

            // var_dump($row);
            $data[$v][] = $row;
        }
    }
}

echo json_encode($data);




