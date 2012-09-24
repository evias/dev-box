<?php
/**
 *
 */

namespace core\mvc;

/* Dependencies: */
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Controller\PluginBroker;
use Zend\Loader\Pluggable;
use Zend\Loader\Broker;

abstract class AbstractController
    extends AbstractActionController
    implements Pluggable
{
    /**
     *  PluginBroker setter method
     *
     *  Method for setting the Broker instance
     *  to be used to retrieve plugins.
     *
     *  @param  Broker  $broker
     *
     *  @return self
     */
    public function setBroker(Broker $broker)
    {
        $this->broker = $broker;
        return $this;
    }

    /**
     *  PluginBroker getter method
     *
     *  Method for getting the Broker instance
     *  used for retrieving plugins.
     *
     *  @return Zend\Loader\Broker
     */
    public function getBroker()
    {
        if (!$this->broker instanceof Broker)
            $this->setBroker(new PluginBroker);

        return $this->broker;
    }

    /**
     *  Retrieve a plugin by it's little name
     *
     *  The plugin() method can be used to retrieve the
     *  named plugin instance from anywhere in a controller
     *  class.
     *
     *  @param  string  $plugin     the plugin short name
     *  @param  array   $options    options for the plugin execution
     *
     *  @return Zend\Mvc\Controller\Plugin\AbstractPlugin
     */
    public function plugin($plugin, array $options = null)
    {
        return $this->getBroker()
                    ->load($plugin, $options);
    }
}
