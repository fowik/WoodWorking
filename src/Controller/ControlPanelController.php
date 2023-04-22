<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;  
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
            'users'=> $obj->getUsers()
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
    
    public function addProduct(ServerRequestInterface $reqyest): ResponseInterface
    {
        $obj = new ClassSessionCheck();
        $obj->LoggedAdminSessionCheck();

        if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['catID']) && !empty($_FILES['image'])){
            $obj = new ClassAdd();
            $obj->addProd();
        } else {
            $_SESSION['message'] = 'Lūdzu aizpildiet visus laukus!';
        }

        $obj = new ClassAdd();

        return $this->renderTemplate('control-panel-add-product.php', ['types' => $obj->getTypes()]);
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
}