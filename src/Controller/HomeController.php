<?php

declare(strict_types=1);

namespace ilari\App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;

class HomeController extends DefaultController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {   
        $stmt = $this->database->prepare("SELECT * FROM user;");
        $this->database->execute($stmt);

        return $this->renderTemplate('home-template.php');
    }

}