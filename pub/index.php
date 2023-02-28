<?php
 
declare(strict_types=1);

$uri = $_SERVER['REQUEST_URI'];

require_once __DIR__ . '/../bootstrap.php';

if ('/' === $uri) {
    (new \ilari\App\Controller\HomeController())->execute();
} elseif ('/register' === $uri) {
    (new \ilari\App\Controller\RegisterController())->execute();
}