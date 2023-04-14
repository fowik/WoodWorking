<?php

namespace App\Class;

use App\DatabaseConnection;

class ClassLoginForm extends DatabaseConnection {
    private $username;
    private $email;
    private $tel;
    private $password;
    private $uData = [];

    public function __construct(){
        $this->username = $_POST['username'];
        $this->email = $_POST['email'];
        $this->tel = $_POST['tel'];
        $this->password = $_POST['password'];
        $this->uData = [$this->username, $this->email, $this->tel, $this->password];
    }

    public function get_uData(){
        return $this->uData;
    }
}