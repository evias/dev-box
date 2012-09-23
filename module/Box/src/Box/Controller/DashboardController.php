<?php
/**
 *  @package    eVias.dev-box
 *  @category   MVC
 *  @author     Grégory Saive <saive.gregory@gmail.com>
 */
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Box\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DashboardController
    extends AbstractActionController
{
    public function homeAction()
    {
        return new ViewModel();
    }
}
