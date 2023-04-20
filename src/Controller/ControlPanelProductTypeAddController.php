<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;  
use App\Class\ClassAdd;

class ControlPanelProductTypeAddController extends DefaultController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassAdd();
        $obj->addType();
        
        return $this->renderTemplate('control-panel-add-type.php');
    }

}