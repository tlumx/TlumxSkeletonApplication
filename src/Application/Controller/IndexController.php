<?php

namespace Application\Controller;

use Tlumx\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $this->getView()->some = "Hello, Tlumx!!!";
        echo $this->render();
    }
}