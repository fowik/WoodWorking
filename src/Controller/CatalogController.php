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
            'products' => $obj->getProd(),
            'types' => $obj->getTypes()
        ]);
    }
}