<?php
/**
 *  @package    evias/dev-box
 *  @category   core\render
 *  @author     Grégory Saive <saive.gregory@gmail.com>
 */

namespace core\render;

use Zend\View\Model\ViewModel;

class NoLayoutViewModel
    extends ViewModel
{
    public function __construct ($variables = null, $options = null)
    {
        parent::__construct($variables,$options);

        $this->setTerminal(true);
    }
}
