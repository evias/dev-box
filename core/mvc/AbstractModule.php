<?php
/**
 *
 */

namespace core\mvc;

use Zend\Mvc\ModuleRouteListener;

abstract class AbstractModule
{
    public function onBootstrap($e)
    {
        /* Initialize translator, event manager and route listener. */
        $e->getApplication()
          ->getServiceManager()
          ->get('translator');
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getAutoloaderConfig()
    {
        $paths      = $this->getPaths();
        $namespace  = $this->getNamespace();
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    $namespace => $paths["namespace"],
                ),
            ),
        );
    }

    abstract public function getConfig();
    abstract protected function getPaths();
    abstract protected function getNamespace();
}

