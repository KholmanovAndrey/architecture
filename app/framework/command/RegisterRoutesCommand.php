<?php
/**
 * Created by PhpStorm.
 * User: Kholmanov Andrey
 * Date: 26.02.2020
 * Time: 20:09
 */

namespace Framework\Command;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class RegisterRoutesCommand
{
    /**
     * @var RouteCollection
     */
    protected $routeCollection;

    /**
     * @var ContainerBuilder
     */
    protected $containerBuilder;

    public function __construct(ContainerBuilder $containerBuilder)
    {
        $this->containerBuilder = $containerBuilder;
    }

    /**
     * @return void
     */
    protected function registerRoutes(): void
    {
        $this->routeCollection = require __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routing.php';
        $this->containerBuilder->set('route_collection', $this->routeCollection);
    }
}