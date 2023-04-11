<?php

namespace App\Class;

class ClassForm {
    public function get_uData(){
        if (! empty($_POST)) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['confirm_password'];

            $dArr = [$username, $email, $password, $password_confirm];

            if ($password === $password_confirm){
                return $dArr;
            } else {
                return $dArr;
            }
        }
    }
}