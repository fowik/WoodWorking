<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;  
use App\Class\ClassControlPanel;
use App\Class\ClassAddProduct;

class ControlPanelController extends DefaultController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassControlPanel();

        return $this->renderTemplate('control-panel-template.php', 
        [
            'uCount' => $obj->getUserCount(),
            'users'=> $obj->getUsers()
        ]);
    }

    public function showProducts(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassControlPanel();

        return $this->renderTemplate('control-panel-products.php',
        [
            'products' => $obj->getProd()
        ]);
    }
    
    public function addProduct(ServerRequestInterface $reqyest): ResponseInterface
    {
        if (! empty($_POST)){
            $obj = new ClassAddProduct();
            $obj->addProd();
        }

        $obj = new ClassAddProduct();

        return $this->renderTemplate('control-panel-add-product.php', ['types' => $obj->getTypes()]);
    }

    public function addProductType(ServerRequestInterface $request): ResponseInterface
    {
        if (! empty($_POST)){
            $obj = new ClassAddProduct();
            $obj->addType();
        }
        
        return $this->renderTemplate('control-panel-add-type.php');
    }
}