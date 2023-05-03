<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\Response\JsonResponse;

use App\Class\ClassCart;
use App\Class\ClassSessionCheck;

class CartController extends DefaultController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassSessionCheck();
        $obj->sessionCheck();

        $obj = new ClassCart();
        $obj->displayCart();

        return $this->renderTemplate('cart-template.php', [
            'cart' => $obj->displayCart()
        ]);
    }

    public function deleteProd(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassCart();
        $obj->deleteFromCart();

        header('Location: /cart');
        exit();
    }

    public function updateCart(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassCart();
        $response = $obj->updateCart();
        $response['CartTotal'] = 0;
        $response['CartTotal'] += $response['ProductTotal'];

        return new JsonResponse($response);
    }

    public function confirmOrder(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassCart();
        $obj->confirmOrder();

        header('Location: /cart');
        exit();
    }
}