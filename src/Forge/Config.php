<?php


namespace Forge;


/**
 * Created by PhpStorm.
 * User: milos
 * Date: 21.12.15.
 * Time: 00.34
 */
class Config
{

    /**
     * @var string
     */
    private $dbType;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $port;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $dbname;

    /**
     * @var string
     */
    private $destination_path;

    /**
     * @var array
     */
    private $exclude_tables;


    /**
     * Config constructor.
     *
     * @param string $dbType
     * @param string $host
     * @param string $port
     * @param string $user
     * @param string $password
     * @param string $dbname
     * @param string $destination_path
     * @param array  $exclude_tables
     */
    public function __construct($dbType = "", $host = "", $port = "", $user = "", $password = "", $dbname = "", $destination_path = "", $exclude_tables = array())
    {
        $this->setDbType($dbType);
        $this->setHost($host);
        $this->setPort($port);
        $this->setUser($user);
        $this->setPassword($password);
        $this->setDbname($dbname);
        $this->setDestinationPath($destination_path);
        $this->setExcludeTables($exclude_tables);

    }


    /**
     * @return mixed
     */
    public function getDbType()
    {
        return $this->dbType;
    }

    /**
     * @param mixed $dbType
     */
    public function setDbType($dbType)
    {
        $this->dbType = $dbType;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * @param mixed $dbname
     */
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;
    }

    /**
     * @return mixed
     */
    public function getDestinationPath()
    {
        return $this->destination_path;
    }

    /**
     * @param mixed $destination_path
     */
    public function setDestinationPath($destination_path)
    {
        $this->destination_path = $destination_path;
    }

    /**
     * @return mixed
     */
    public function getExcludeTables()
    {
        return $this->exclude_tables;
    }

    /**
     * @param mixed $exclude_tables
     */
    public function setExcludeTables($exclude_tables)
    {
        $this->exclude_tables = $exclude_tables;
    }


}