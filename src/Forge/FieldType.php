<?php


namespace Forge;

/**
 * Created by PhpStorm.
 * User: milos
 * Date: 21.12.15.
 * Time: 01.02
 *
 * The constants that represent the general field types
 * are from http://www.w3schools.com/sql/sql_datatypes_general.asp
 *
 */
class FieldType
{
    const CHARACTER = "CHARACTER";

    const VARCHAR = "VARCHAR";

    const BINARY = "BINARY";

    const BOOLEAN = "BOOLEAN";

    const VARBINARY = "VARBINARY";

    const INTEGER = "INTEGER";

    const SMALLINT = "SMALLINT";

    const BIGINT = "BIGINT";

    const DECIMAL = "DECIMAL";

    const NUMERIC = "NUMERIC";

    const FLOAT = "FLOAT";

    const REAL = "REAL";

    const DOUBLE_PRECISION = "DOUBLE PRECISION";

    const DATE = "DATE";

    const TIME = "TIME";

    const TIMESTAMP = "TIMESTAMP";

    const INTERVAL = "INTERVAL";

    const XML = "XML";

    private $type;

    private $length = 0;

    private $precision = 0;

    private $scale = 0;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param int $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }


    /**
     * @return int
     */
    public function getPrecision()
    {
        return $this->precision;
    }

    /**
     * @param int $precision
     */
    public function setPrecision($precision)
    {
        $this->precision = $precision;
    }

    /**
     * @return int
     */
    public function getScale()
    {
        return $this->scale;
    }

    /**
     * @param int $scale
     */
    public function setScale($scale)
    {
        $this->scale = $scale;
    }


}