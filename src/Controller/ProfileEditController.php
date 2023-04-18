<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;  
use App\Class\ClassUpdateProfile;
use App\Class\ClassSession;
use App\Class\ClassLoginForm;

class ProfileEditController extends DefaultController
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];

            $data = [
                'id' => $id,
                'name' => $name,
                'surname' => $surname,
                'email' => $email,
                'tel' => $tel
            ];
            
            // Pass the data to the ClassUpdateProfile for processing
            ClassUpdateProfile::updateProfile($data);
            
            // Destroy the session
            ClassSession::destroy();
            // Create a new session
            echo $data['name'];
            echo $data['id'];
            
            ClassSession::set(ClassLoginForm::edit_uData($data['id']));
            // Get the session
            ClassSession::get();
                    
            $_SESSION['message'] = 'Profils veiksmīgi atjaunināts!';

            // Redirect to the profile page
            header('Location: /profile');
        }
        exit;
    }
}