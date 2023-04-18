<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;  
use App\Class\ClassSession; 

class LogoutController extends DefaultController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        // if ($request->getMethod() === 'post') {
        // }
        
        $form = new ClassSession;
        $form->destroy();
        
        header('Location: /');
        exit;
    }

}