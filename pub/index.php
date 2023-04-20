<?php
 
declare(strict_types=1);

$uri = $_SERVER['REQUEST_URI'];

require_once __DIR__ . '/../bootstrap.php';

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

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
$router->map('GET', '/register', App\Controller\RegisterController::class);
$router->map('POST', '/register', App\Controller\RegisterController::class);
$router->map('GET', '/login', App\Controller\LoginController::class);
$router->map('POST', '/login', App\Controller\LoginController::class);
$router->map('GET', '/logout', App\Controller\LogoutController::class);
$router->map('GET', '/profile', App\Controller\ProfileController::class);
$router->map('GET', '/profile/edit', App\Controller\ProfileEditController::class);
$router->map('POST', '/profile/edit', App\Controller\ProfileEditController::class);
$router->map('GET', '/control-panel', App\Controller\ControlPanelController::class);
$router->map('GET', '/control-panel/products', App\Controller\ControlPanelProductController::class);
$router->map('GET', '/control-panel/products/add', App\Controller\ControlPanelProductAddController::class);
$router->map('GET', '/control-panel/products/type-add', App\Controller\ControlPanelProductTypeAddController::class);
// $router->map('GET', '/control-panel/users', App\Controller\ControlPanelUsersController::class);
// $router->map('GET', '/control-panel/users/edit', App\Controller\ControlPanelUsersEditController::class);
// $router->map('POST', '/control-panel/users/edit', App\Controller\ControlPanelUsersEditController::class);
// $router->map('GET', '/control-panel/users/delete', App\Controller\ControlPanelUsersDeleteController::class);
// $router->map('GET', '/control-panel/users/add', App\Controller\ControlPanelUsersAddController::class);
// $router->map('POST', '/control-panel/users/add', App\Controller\ControlPanelUsersAddController::class);
// $router->map('GET', '/profile/delete', App\Controller\ProfileDeleteController::class);
// $router->map('GET', '/profile/change-password', App\Controller\ProfileChangePasswordController::class);
// $router->map('POST', '/profile/change-password', App\Controller\ProfileChangePasswordController::class);
// $router->map('GET', '/profile/change-email', App\Controller\ProfileChangeEmailController::class);
// $router->map('POST', '/profile/change-email', App\Controller\ProfileChangeEmailController::class);
$router->map('GET', '/contact-us', App\Controller\ContactController::class);

$response = $router->dispatch($request);

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);