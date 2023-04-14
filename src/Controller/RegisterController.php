<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Class\ClassSendToDB;
use Laminas\Diactoros\Response;   

class RegisterController extends DefaultController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        // if ($request->getMethod() === 'post') {
        // }
        session_start();
        
        $obj = new ClassSendToDB();
        $obj->sendToDB();
                
        return $this->renderTemplate('register-template.php');
    }

}