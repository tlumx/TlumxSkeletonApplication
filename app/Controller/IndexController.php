<?php

namespace App\Controller;

use Tlumx\Application\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        return $this->render();
    }
    
    public function helloAction($request)
    {
        $name = $request->getAttribute('name');
        $this->getView()->name = $name;
        return $this->render();
    }    
}