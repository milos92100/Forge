<?php
/**
 * Created by PhpStorm.
 * User: milos
 * Date: 21.12.15.
 * Time: 00.34
 */

namespace Revelin;


class Config
{

    const MYSQL = "mysql";

    const MONGODB = "mongodb";

    const MSSQL = "mssql";

    const POSTGRESQL = "postgresql";

    const ORACLE = "oracle";

    const SQLITE = "sqlite";

    const DB2 = "db2";

    private $dbType;

    private $host;

    private $port;

    private $user;

    private $password;

    private $dbname;

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


}