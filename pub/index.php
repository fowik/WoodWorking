<?php
 
declare(strict_types=1);

$uri = $_SERVER['REQUEST_URI'];

require_once __DIR__ . '/../bootstrap.php';

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\ErrorHandler\Debug;
use League\Route\Http\Exception\NotFoundException;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\Response\RedirectResponse;

Debug::enable();

if(str_contains($uri, '.css') || str_contains($uri, '.js')) {
    return false;
}

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

session_start();

$router = new League\Route\Router;

// map a route
$router->map('GET', '/', App\Controller\HomeController::class);
$router->map('GET', '/404', [App\Controller\HomeController::class, 'error']);
// register and login routes
$router->map('GET', '/register', App\Controller\RegisterController::class);
$router->map('POST', '/register', App\Controller\RegisterController::class);
$router->map('GET', '/login', App\Controller\LoginController::class);
$router->map('POST', '/login', App\Controller\LoginController::class);
// profile routes
$router->map('GET', '/logout', App\Controller\LogoutController::class);
$router->map('GET', '/profile', App\Controller\ProfileController::class);
$router->map('GET', '/profile/edit', [App\Controller\ProfileController::class, 'editUser']);
$router->map('POST', '/profile/edit', [App\Controller\ProfileController::class, 'editUser']);
// control panel routes
$router->map('GET', '/control-panel', App\Controller\ControlPanelController::class);
$router->map('GET', '/control-panel/search-users', [App\Controller\ControlPanelController::class, 'searchUsers']);
$router->map('GET', '/control-panel/products', [App\Controller\ControlPanelController::class, 'showProducts']);
$router->map('GET', '/control-panel/products/add', [App\Controller\ControlPanelController::class, 'addProduct']);
$router->map('POST', '/control-panel/products/add', [App\Controller\ControlPanelController::class, 'addProduct']);
$router->map('GET', '/control-panel/products/type-add', [App\Controller\ControlPanelController::class, 'addProductType']);
$router->map('POST', '/control-panel/products/type-add', [App\Controller\ControlPanelController::class, 'addProductType']);
$router->map('GET', '/control-panel/products/delete', [App\Controller\ControlPanelController::class, 'deleteProduct']);
$router->map('POST', '/control-panel/products/delete', [App\Controller\ControlPanelController::class, 'deleteProduct']);
$router->map('POST', '/control-panel/delete', [App\Controller\ControlPanelController::class, 'deleteUser']);
$router->map('GET', '/control-panel/delete', [App\Controller\ControlPanelController::class, 'deleteUser']);
$router->map('GET', '/control-panel/products/search-products', [App\Controller\ControlPanelController::class, 'searchProducts']);
$router->map('GET', '/control-panel/products/edit', [App\Controller\ControlPanelController::class, 'showEditProduct']);
$router->map('POST', '/control-panel/products/edit', [App\Controller\ControlPanelController::class, 'showEditProduct']);
$router->map('GET', '/control-panel/product/product-edit', [App\Controller\ControlPanelController::class, 'EditProduct']);
$router->map('POST', '/control-panel/product/product-edit', [App\Controller\ControlPanelController::class, 'EditProduct']);
$router->map('GET', '/control-panel/edit-user', [App\Controller\ControlPanelController::class, 'showEditUser']);
$router->map('POST', '/control-panel/edit-user', [App\Controller\ControlPanelController::class, 'showEditUser']);
$router->map('GET', '/control-panel/user/edit', [App\Controller\ControlPanelController::class, 'EditUser']);
$router->map('POST', '/control-panel/user/edit', [App\Controller\ControlPanelController::class, 'EditUser']);
$router->map('GET', '/control-panel/orders', [App\Controller\ControlPanelController::class, 'showOrders']);
$router->map('GET', '/control-panel/orders/export-to-csv', [App\Controller\ControlPanelController::class, 'ordersToCsv']);

// catalog routes
$router->map('GET', '/catalog', App\Controller\CatalogController::class);
$router->map('POST', '/catalog', App\Controller\CatalogController::class);
$router->map('GET', '/catalog/product', [App\Controller\CatalogController::class, 'showProduct']);
$router->map('POST', '/catalog/product', [App\Controller\CatalogController::class, 'showProduct']);
$router->map('GET', '/catalog/product/add-to-cart', [App\Controller\CatalogController::class, 'addToCart']);
$router->map('POST', '/catalog/product/add-to-cart', [App\Controller\CatalogController::class, 'addToCart']);
// cart routes
$router->map('GET', '/cart', App\Controller\CartController::class);
$router->map('POST', '/cart', App\Controller\CartController::class);
$router->map('GET', '/cart/delete', [App\Controller\CartController::class, 'deleteProd']);
$router->map('POST', '/cart/delete', [App\Controller\CartController::class, 'deleteProd']);
$router->map('GET', '/cart/update', [App\Controller\CartController::class, 'updateCart']);
$router->map('POST', '/cart/update', [App\Controller\CartController::class, 'updateCart']);
$router->map('GET', '/cart/confirm', [App\Controller\CartController::class, 'confirmOrder']);
$router->map('POST', '/cart/confirm', [App\Controller\CartController::class, 'confirmOrder']);

// contact routes
$router->map('GET', '/contact-us', App\Controller\ContactController::class);

try {
    $response = $router->dispatch($request);
} catch (NotFoundException $e) {
    $response = new RedirectResponse('/404');
    // $response->getBody()->write('Page not found');
}

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);