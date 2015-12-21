<?php

//ini_set("display_errors", "1");
require 'bootstrap.php';

use Revelin\MyTest;
use Revelin\Common\Collection;


$milos = new MyTest();
//$milos->milos();

//$coll = new Collection();


$link = mysqli_connect("localhost", "root", "milos");
mysqli_select_db($link, "chatsky");

$query = "SHOW TABLES";
$res = mysqli_query($link, $query);

$tables = array();


while ($row = mysqli_fetch_assoc($res)) {

    $tables[] = array_values($row);
}


//var_dump($tables);


//exit();

$data = array();

foreach ($tables as $table => $val) {

    foreach ($val as $a => $v) {

        $query = "DESCRIBE " . $v;


        $res = mysqli_query($link, $query);

        while ($row = mysqli_fetch_object($res)) {

            // var_dump($row);
            $data[$v][] = $row;
        }
    }
}

echo json_encode($data);




