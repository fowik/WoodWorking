<?php

namespace App\Class;

use App\DatabaseConnection;
use App\Class\ClassSession;

class ClassSignIn extends DatabaseConnection {
    public function signIn(){
        if (! empty($_POST)) {
            $conn = new DatabaseConnection();

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } else {
                $obj = new ClassLoginForm();

                ClassSession::set($obj->get_uData());
                ClassSession::get();

                $_SESSION['message'] = 'Pieteikšanās veiksmīga!';

                header('Location: /profile');
                exit();
            }
        }
    }
}