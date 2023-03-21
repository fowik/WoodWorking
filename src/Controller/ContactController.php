<?php

declare(strict_types=1);

namespace ilari\App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;

class ContactController extends DefaultController
{
    public function __invoke(): ResponseInterface
    {
        return $this->renderTemplate('contact-us-template.php');
    }

}