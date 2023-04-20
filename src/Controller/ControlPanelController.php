<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;  
use App\Class\ClassControlPanel;

class ControlPanelController extends DefaultController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassControlPanel();
        // $var = $obj->getUserCount();

        return $this->renderTemplate('control-panel-template.php');
    }

}