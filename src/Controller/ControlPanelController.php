<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;  
use Laminas\Diactoros\Response\JsonResponse;

use App\Class\ClassSessionCheck;
use App\Class\ClassControlPanel;
use App\Class\ClassAdd;
use App\Class\ClassDelete;
use App\Class\ClassEdit;

class ControlPanelController extends DefaultController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassSessionCheck();
        $obj->LoggedAdminSessionCheck();

        $obj = new ClassControlPanel();

        return $this->renderTemplate('control-panel-template.php', 
        [
            'uCount' => $obj->getUserCount(),
            'users'=> $obj->getUsers(),
            'oCount' => $obj->getOrderCount(),
            'pCount' => $obj->getProdCount(),
            'totalMonth' => $obj->getTotalMonth(),
            'totalYear' => $obj->getTotalYear()
        ]);
    }

    public function showProducts(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassSessionCheck();
        $obj->LoggedAdminSessionCheck();

        $obj = new ClassControlPanel();
        
        return $this->renderTemplate('control-panel-products.php',
        [
            'products' => $obj->getProd()
        ]);
    }

    public function showOrders(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassSessionCheck();
        $obj->LoggedAdminSessionCheck();

        $obj = new ClassControlPanel();

        return $this->renderTemplate('control-panel-orders.php',
        [
            'orders' => $obj->getOrders()
        ]);
    }
    
    public function ordersToCsv(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassSessionCheck();
        $obj->LoggedAdminSessionCheck();

        $obj = new ClassControlPanel();
        $obj->exportToCsv();

        return new Response\RedirectResponse('/control-panel/orders');
    }


    public function addProduct(ServerRequestInterface $reqyest): ResponseInterface
    {
        $obj = new ClassSessionCheck();
        $obj->LoggedAdminSessionCheck();

        if (!empty($_POST['title']) || !empty($_POST['price']) || !empty($_POST['description']) || !empty($_POST['catID'])){
            $obj = new ClassAdd();
            $obj->addProd();
        }

        $obj = new ClassAdd();

        return $this->renderTemplate('control-panel-add-product.php', 
        [
            'types' => $obj->getTypes()
        ]);
    }

    public function addProductType(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassSessionCheck();
        $obj->LoggedAdminSessionCheck();

        if (! empty($_POST['type'])){
            $obj = new ClassAdd();
            $obj->addType();
        }
        
        return $this->renderTemplate('control-panel-add-type.php');
    }

    public function deleteProduct(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassSessionCheck();
        $obj->LoggedAdminSessionCheck();

        $obj = new ClassDelete();
        $obj->deleteProduct();

        return new Response\RedirectResponse('/control-panel/products');
    }

    public function deleteUser(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassSessionCheck();
        $obj->LoggedAdminSessionCheck();
        
        $obj = new ClassDelete();
        $obj->deleteUser();

        return new Response\RedirectResponse('/control-panel');
    }

    public function showEditProduct(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassSessionCheck();
        $obj->LoggedAdminSessionCheck();

        $obj = new ClassEdit();

        return $this->renderTemplate('control-panel-edit-product.php', [
            'types' => $obj->getTypes(),
            'product' => $obj->getProd()
        ]);
    }

    public function EditProduct(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassSessionCheck();
        $obj->LoggedAdminSessionCheck();
        
        $obj = new ClassEdit();
        if (!empty($_POST)){
            $obj->editProd();
        } 

        return new Response\RedirectResponse('/control-panel/products');
    }

    public function showEditUser(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassSessionCheck();
        $obj->LoggedAdminSessionCheck();

        $obj = new ClassEdit();

        return $this->renderTemplate('control-panel-edit-user.php', ['user' => $obj->getUser()]);
    }

    public function EditUser(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassSessionCheck();
        $obj->LoggedAdminSessionCheck();

        $obj = new ClassEdit();
        if (!empty($_POST)){
            $obj->editUser();
        }

        return new Response\RedirectResponse('/control-panel');
    }

    public function searchUsers(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassSessionCheck();
        $obj->LoggedAdminSessionCheck();

        $obj = new ClassControlPanel();
        $response = $obj->searchUsers($request->getQueryParams()['search']);

        return new JsonResponse($response);
    }

    public function searchProducts(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassSessionCheck();
        $obj->LoggedAdminSessionCheck();

        $obj = new ClassControlPanel();
        $response = $obj->searchProducts($request->getQueryParams()['search']);

        return new JsonResponse($response);
    }
}