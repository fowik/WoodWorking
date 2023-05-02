<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Class\ClassSendToDB;
use App\Class\ClassSessionCheck; 
use Laminas\Diactoros\Response;   

class RegisterController extends DefaultController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        // if ($request->getMethod() === 'post') {
        // }
        
        $obj = new ClassSessionCheck();
        $obj->LoggedUserSessionCheck();

        $obj = new ClassSendToDB();
        $obj->sendToDB();
            
        return $this->renderTemplate('register-template.php');
    }
}