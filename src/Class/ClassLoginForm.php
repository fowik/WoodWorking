<?php

namespace App\Class;

use App\DatabaseConnection;

class ClassLoginForm extends DatabaseConnection {
    private $username;
    private $password;
    private $uData = [];

    public function __construct(){
        $this->username = $_POST['username'];
        $this->password = $_POST['password'];
    }

    public function get_uData(){
        $conn = DatabaseConnection::__construct();
        
        $sql = "SELECT * FROM `user` WHERE `username` = '$this->username'";
        $result = $conn->query($sql);

        if($result->rowCount() > 0) {
            if($row = $result->fetch()) {
                $username = $row['username'];
                $email = $row['email'];
                $tel = $row['number'];
                $password = $row['password'];

                if (password_verify($this->password, $password)) {
                    $this->uData = [$username, $email, $tel];
                    return $this->uData;
                } else {
                    $_SESSION["message"] = 'Lietotājvārds vai parole ir nepareiza!';
                    header("Location: /login");
                    exit();
                }
            }
        } else {
            $_SESSION["message"] = 'Lietotājvārds vai parole ir nepareiza!';
            header("Location: /login");
            exit();
        }
    }
}