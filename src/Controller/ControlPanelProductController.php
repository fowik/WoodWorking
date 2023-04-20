<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;  

class ControlPanelProductController extends DefaultController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        
        return $this->renderTemplate('control-panel-product.php');
    }

}