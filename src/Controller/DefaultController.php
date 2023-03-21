<?php

declare(strict_types=1);

namespace ilari\App\Controller;

use Laminas\Diactoros\Response;

abstract class DefaultController 
{
    protected function renderTemplate(string $templatePath) 
    {
        // echo sprintf(__DIR__ . '/../assets/views/%s', $templatePath);

        ob_start();
        require sprintf(__DIR__ . '/../../assets/views/%s', $templatePath);
        $view = ob_get_clean();

        ob_start();
        require __DIR__ . '/../../assets/views/main-template.php';
        $main = ob_get_clean();

        $response = new Response();
        $response->getBody()->write(str_replace('{{ content }}', $view, $main));

        return $response;
    }
}
