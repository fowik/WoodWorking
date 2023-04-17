<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;   
use App\Class\ClassSessionCheck;

class ProfileController extends DefaultController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        // if ($request->getMethod() === 'post') {
        // }
        
        $obj = new ClassSessionCheck();
        $obj->sessionCheck();

        return $this->renderTemplate('profile-template.php');
    }

}