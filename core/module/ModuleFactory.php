<?php
/**
 * @package     evias/dev-box
 * @category    core/module
 * @author      Grégory Saive <saive.gregory@gmail.com>
 */

namespace core\module;

use InvalidArgumentException;

class ModuleFactory
{
    /**
     *
     */
    static private $_instance = null;

    /**
     *
     */
    static private $_modules = array();

    /**
     *
     */
    static public function getInstance()
    {
        if (null === self::$_instance)
            self::$_instance = new self;

        return self::$_instance;
    }

    /**
     *
     */
    private function __construct()
    {
    }

    /**
     *
     */
    public function getModule( $moduleName, array $opts = array() )
    {
        $class = "core\\module\\$moduleName";
        if ( class_exists($class) ) {
            if (! isset(self::$_modules[$class]) ) {
                self::$_modules[$class] = new $class( $opts );
            }

            return self::$_modules[$class];
        }
        else {
            if ( file_exists(__DIR__ . "/$moduleName.php") ) {
                require_once __DIR__ . "/$moduleName.php";

                self::$_modules[$class] = new $class( $opts );
                return self::$_modules[$class];
            }
            else
                throw new InvalidArgumentException( sprintf("Module '%s' is invalid.", $moduleName) );
        }
    }
}
