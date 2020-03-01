<?php

use Controller\MainController;
use Controller\OrderInfoController;
use Controller\ProductInfoController;
use Controller\UserLogoutController;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add(
    'index',
    new Route('/', ['_controller' => [MainController::class, 'indexAction']])
);

$routes->add(
    'product_list',
    new Route('/product/list', ['_controller' => [ProductInfoController::class, 'listAction']])
);
$routes->add(
    'product_info',
    new Route('/product/info/{id}', ['_controller' => [ProductInfoController::class, 'infoAction']])
);

$routes->add(
    'order_info',
    new Route('/order/info', ['_controller' => [OrderInfoController::class, 'infoAction']])
);
$routes->add(
    'order_checkout',
    new Route('/order/checkout', ['_controller' => [OrderInfoController::class, 'checkoutAction']])
);

$routes->add(
    'user_authentication',
    new Route('/user/authentication', ['_controller' => [UserLogoutController::class, 'authenticationAction']])
);
$routes->add(
    'logout',
    new Route('/user/logout', ['_controller' => [UserLogoutController::class, 'logoutAction']])
);

return $routes;
