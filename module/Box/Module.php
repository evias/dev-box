<?php
/**
 *  @package    eVias.dev-box
 *  @category   MVC
 *  @author     Grégory Saive <saive.gregory@gmail.com>
 **/
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Box;

use core\mvc\AbstractModule;

class Module
    extends AbstractModule
{
    public function onBootstrap($e)
    {
        parent::onBootstrap($e);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    protected function getPaths()
    {
        return array(
            "namespace" => __DIR__ . '/src/' . __NAMESPACE__,
        );
    }

    protected function getNamespace()
    {
        return __NAMESPACE__;
    }
}
