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

use Zend\View\Model\ViewModel;
use Zend\Http\Request as HttpRequest;
use core\mvc\AbstractController;
use core\render\NoLayoutViewModel;
use core\module\ModuleFactory;

class GetSimulatorController
    extends AbstractController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    /**
     *  Process a GET request
     *
     *  This action method returns a response object
     *  in order to disable rendering the layout and
     *  view.
     *
     *  @return Zend\Http\PhpEnvironment\Response
     */
    public function processRequestAction()
    {
        if ( false === $this->getRequest()->getQuery()
                            ->get("do_request", false)) {

            $responseHTML = "Invalid request initiator";
        }
        else {
            /* Form sent, now validate the configured request */
            $request    = $this->getRequest();
            $parameters = $request->getQuery()->toArray();

            $options = array();
            if (count($parameters["param_names"])
                && ! empty($parameters["param_names"][0])) {

                $options = array_combine($parameters["param_names"],
                                         $parameters["param_values"]);
            }

            /* Process request */
            $responseHTML = ModuleFactory::getInstance()
                                ->getModule("GetSimulator")
                                ->processRequest($options);
        }

        $response = $this->getResponse();
        $response->setStatusCode( 200 );
        $response->setContent($responseHTML);
        return $response;
    }
}
