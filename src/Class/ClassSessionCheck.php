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
            exit();
        }
    }
}