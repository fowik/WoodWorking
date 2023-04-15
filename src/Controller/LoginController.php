<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Class\ClassSignIn;
use Laminas\Diactoros\Response;   

class LoginController extends DefaultController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        // if ($request->getMethod() === 'post') {
        // }
        session_start();

        $obj = new ClassSignIn();
        $obj->signIn();

        return $this->renderTemplate('login-template.php');
    }

}