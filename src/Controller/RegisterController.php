<?php

declare(strict_types=1);

namespace ilari\App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;

class RegisterController extends DefaultController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        
        return $this->renderTemplate('register-template.php');
    }

}