<?php

namespace App\Class;

use App\DatabaseConnection;

class ClassSignIn extends DatabaseConnection {
    public function signIn(){
        if (! empty($_POST)) {
            $conn = new DatabaseConnection();

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } else {
                $obj = new ClassLoginForm();

                // Session::set('user', $obj->get_uData());

                $_SESSION['user'] = [
                    'username' => $obj->get_uData()[0],
                    'email' => $obj->get_uData()[1],
                    'tel' => $obj->get_uData()[2]
                ];

                // Session::get('user');

                $_SESSION['message'] = 'Pieteikšanās veiksmīga!';

                header('Location: /profile');
                exit();
            }
        }
    }
}