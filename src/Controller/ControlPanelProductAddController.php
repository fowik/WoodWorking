<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;  
use App\Class\ClassAdd;

class ControlPanelProductAddController extends DefaultController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $obj = new ClassAdd();
            $obj->addProd();
        }

        return $this->renderTemplate('control-panel-add-product.php');
    }

}