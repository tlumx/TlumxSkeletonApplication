<?php
/**
 * Tlumx (https://tlumx.com/)
 *
 * @author    Yaroslav Kharitonchuk <yarik.proger@gmail.com>
 * @link      https://github.com/tlumx/TlumxSkeletonApplication
 * @copyright Copyright (c) 2016-2018 Yaroslav Kharitonchuk
 * @license   https://github.com/tlumx/TlumxSkeletonApplication/blob/master/LICENSE.md  (MIT License)
 */
namespace App\Handler;

use Tlumx\Application\Handler\NotFoundHandlerInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Not Found handler.
 */
class NotFoundHandler implements NotFoundHandlerInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Create an NotFoundHandler service object
     *
     * @param ContainerInterface $container
     * @return $object Service (this)
     */
    public function __invoke(ContainerInterface $container)
    {
        $this->container = $container;
        return $this;
    }

    /**
     * Handle
     *
     * @param array $allowedMethods
     * @return ResponseInterface
     */
    public function handle(array $allowedMethods = []): ResponseInterface
    {
        $config = $this->container->get('config');
        $view = $this->container->get('view');
        $response = $this->container->get('response');

        if (empty($allowedMethods)) {
            $response = $response->withStatus(404);
            $message = 'Page not found';
        } else {
            $response = $response->withStatus(405);
            $message = 'Method Not Allowed';
        }
        $view->message = $message;
        $view->setTitle($message);

        if (isset($config['templates']['template_404'])) {
            $result = $view->renderFile($config['templates']['template_404']);
        } else {
            $result = "Template \"template_404\" not found!!!";
        }

        $layout = $config->get('layout');
        if ($layout && isset($config['templates'][$layout])) {
            $layoutFile = $config['templates'][$layout];
            $view->content = $result;
            $result = $view->renderFile($layoutFile);
        }

        $response->getBody()->write($result);
        $response->withHeader('Content-Type', 'text/html');
        return $response;
    }
}
