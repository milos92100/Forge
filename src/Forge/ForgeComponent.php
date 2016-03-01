<?php
/**
 * Created by PhpStorm.
 * User: milos
 * Date: 21.2.16.
 * Time: 23.10
 */

namespace Forge;

use Forge\Data\Data;
use Forge\Factory\ConfigFactory;


/**
 * Class ForgeComponent
 *
 * @author  Milos
 * @package Forge
 * @version 1.0
 */
abstract class  ForgeComponent
{

    /**
     * @var Data $data
     */
    protected $data = null;

    /**
     * @var Config $config
     */
    protected $config = null;


    /**
     * ForgeComponent constructor.
     *
     */
    public function __construct()
    {
        $this->data = Data::getInstance();
        $this->config = ConfigFactory::getConfig();
    }

}