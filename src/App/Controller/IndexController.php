<?php
/**
 * Tlumx (https://tlumx.com/)
 *
 * @author    Yaroslav Kharitonchuk <yarik.proger@gmail.com>
 * @link      https://github.com/tlumx/TlumxSkeletonApplication
 * @copyright Copyright (c) 2016-2018 Yaroslav Kharitonchuk
 * @license   https://github.com/tlumx/TlumxSkeletonApplication/blob/master/LICENSE.md  (MIT License)
 */
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
        if ($request->getMethod() === 'POST') {
            $post = $request->getParsedBody();
            $name = isset($post['nameInput']) ? $post['nameInput'] : '';
            return $this->redirectToRoute('hello', ['name' => $name]);
        }

        $name = $request->getAttribute('name');
        $router = $this->getContainer()->get('router');

        $this->getView()->name = $name;
        $this->getView()->url  = $router->uriFor('hello', ['name' => $name]);
        return $this->render();
    }
}
