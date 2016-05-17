<?php

namespace Application\Controller;

use Tlumx\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        echo $this->render();
    }
    
    public function helloAction()
    {
        $request = $this->getServiceProvider()->getRequest();
        $name = $request->getAttribute('name');        
        $this->getView()->name = $name;
        echo $this->render();
    }    
}