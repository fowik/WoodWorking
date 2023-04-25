<?php 

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;

use App\Class\ClassCatalog;

class CatalogController extends DefaultController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassCatalog();

        return $this->renderTemplate('catalog-template.php', 
        [
            'types' => $obj->getTypes(),
            'products' => $obj->getProdWType(),

        ]);
    }

    public function showProduct(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassCatalog();
        
        return $this->renderTemplate('product-template.php', 
        [
            'product' => $obj->getProd()
        ]);
    }

    public function addToCart(ServerRequestInterface $request): ResponseInterface
    {
        $obj = new ClassCatalog();
        $obj->addToCart();

        exit();
    }
}
    