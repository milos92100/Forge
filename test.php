<?php

ini_set("display_errors", "1");
require 'bootstrap.php';

use \Forge\Data\Data;
use \Forge\Factory\ConfigFactory;
use \Forge\Factory\DSNFactory;

$config = ConfigFactory::getConfig();
echo "dbname = " . $config->getDbname() . "<br>";
echo "dbtype = " . $config->getDbType() . "<br>";
echo "host = " . $config->getHost() . "<br>";
echo "passwrod = " . $config->getPassword() . "<br>";
echo "port = " . $config->getPort() . "<br>";
echo "user = " . $config->getUser() . "<br>";
echo "dest = " . $config->getDestinationPath() . "<br>";
var_dump($config->getExcludeTables());

$db = Data::getInstance();

$stmt = $db->query("SHOW TABLES");

$tables = array();
//$tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $tables[] = $row["Tables_in_" . $config->getDbname()];
}


$data = array();


foreach ($tables as $table => $val) {


    $query = "DESCRIBE " . $val;

    $stmt = $db->query($query);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $data[$val][] = $row;
    }

}

echo json_encode($data);