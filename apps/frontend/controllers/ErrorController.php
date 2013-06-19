<?php

namespace ErrorTest\Frontend\Controllers;

class ErrorController extends ControllerBase
{

    public function phpErrorAction()
    {
        $error = $this->dispatcher->getParam('error');

            switch ($error->code()) {
                case 404:
                    $code = 404;
                    break;
                default:
                    $code = 500;
            }

            $this->getDi()->getShared('response')->resetHeaders()->setStatusCode($code, null);
            $this->view->setVar('error', $error);
    }

}

