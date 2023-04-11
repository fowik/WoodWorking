<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Class\ClassForm;
use Laminas\Diactoros\Response;

class RegisterController extends DefaultController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        if ($request->getMethod() === 'post') {
            $form = new ClassForm();
            $form->get_uData(); 
        }
        
        return $this->renderTemplate('register-template.php');
    }

}