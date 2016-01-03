<?php
/**
 * Created by PhpStorm.
 * User: milos
 * Date: 3.1.16.
 * Time: 16.37
 */

namespace Forge;


class DatabaseType
{

    const MYSQL = "mysql";

    const MSSQL = "mssql";

    const POSTGRESQL = "postgresql";

    const ORACLE = "oracle";

    const SQLITE = "sqlite";

    const DB2 = "db2";

    public static $SUPPORTED_DATABASES = array(
        self::MYSQL,
        self::MSSQL,
        self::POSTGRESQL,
        self::ORACLE,
        self::SQLITE,
        self::DB2
    );

}