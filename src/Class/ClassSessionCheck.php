<?php

namespace App\Class;

use App\DatabaseConnection;

class ClassSessionCheck extends DatabaseConnection {
    public function sessionCheck(){
        if (! isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }
    }

    public function LoggedUserSessionCheck() {
        if (isset($_SESSION['user'])) {
            header('Location: /profile');
        }
    }

    public function LoggedAdminSessionCheck() {
        if (isset($_SESSION['user'])) {
            if (($_SESSION['user']['admin'] === 1)) {
                return 0;
            } else {
                header('Location: /');
                exit();
            }
        } else {
            header('Location: /');
            exit();
        }
        
    }
}