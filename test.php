<?php

ini_set("display_errors", "1");
require 'bootstrap.php';


use Forge\MyTest;
use Forge\Common\Collection;
use Forge\Factory\ConfigFactory;


//$json_file = file_get_contents(__DIR__ . '/forge.json');
//$temp = json_decode($json_file);
//echo $json_file;


$config = ConfigFactory::getConfig();
echo $config->getDbname() . "<br>";
echo $config->getDbType() . "<br>";
echo $config->getHost() . "<br>";
echo $config->getPassword() . "<br>";
echo $config->getPort() . "<br>";
echo $config->getUser() . "<br>";
echo $config->getDestinationPath() . "<br>";
var_dump($config->getExcludeTables());

exit;

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




