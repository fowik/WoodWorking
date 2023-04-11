<?php

namespace ilaril\App;

class ClassForm {
    public function get_uData(){
        if (! empty($_POST)) {
            $username = $_POST['usernaem'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['confirm_password'];

            $dArr = [$username, $email, $password, $password_confirm];

            print_r($dArr);

            //return $dArr;
        }
    }
}