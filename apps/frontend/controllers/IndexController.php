<?php

namespace ErrorTest\Frontend\Controllers;

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function faultyAction()
    {
        dasads(); // This is obviously crap :)
    }

}

