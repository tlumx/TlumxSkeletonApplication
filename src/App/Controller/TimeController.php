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

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Container\ContainerInterface;

class TimeController implements RequestHandlerInterface
{
    protected $container;
    /**
     * Create an controller service object.
     *
     * @param ContainerInterface $container
     * @return $object Service (this)
     */
    public function __invoke(ContainerInterface $container)
    {
        $this->container = $container;
        return $this;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $data = json_encode(['time' => time()]);
        $response = $this->container->get('response');
        $response = $response->withStatus(200);
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write($data);

        return $response;
    }
}
