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

use Tlumx\Application\Handler\ExceptionHandlerInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Exception handler.
 */
class ExceptionHandler implements ExceptionHandlerInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Create an ExceptionHandler service object
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
     * Handle exception
     *
     * @param \Exception $e
     * @return ResponseInterface
     */
    public function handle(\Exception $e): ResponseInterface
    {
        $config = $this->container->get('config');
        $view = $this->container->get('view');
        $response = $this->container->get('response');
        $response = $response->withStatus(500);
        $message = 'Internal Server Error';

        $view->message = $message;
        $view->setTitle($message);
        if ($config->get('display_exceptions')) {
            $view->exception = $e;
        }

        if (isset($config['templates']['template_error'])) {
            $result = $view->renderFile($config['templates']['template_error']);
        } else {
            $result = "Template \"template_error\" not found!!!";
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
