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
        $conn = new DatabaseConnection();
        
        $sql = "SELECT * FROM `user` WHERE `username` = '$this->username'";
        $result = $conn->query($sql);
        if($result->rowCount() > 0) {
            if($row = $result->fetch()) {
                $id = $row['uID'];
                $username = $row['Username'];
                $name = $row['Name'];
                $surname = $row['Surname'];
                $email = $row['Email'];
                $tel = $row['PhoneNumber'];
                $password = $row['Password'];

                if (password_verify($this->password, $password)) {
                    $this->uData = [$id, $username, $name, $surname, $email, $tel];
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

    public static function edit_uData($id) {
        $conn = new DatabaseConnection();

        $sql = "SELECT * FROM `user` WHERE `uID` = '$id'";
        $result = $conn->query($sql);
        if($result->rowCount() > 0) {
            if($row = $result->fetch()) {
                $id = $row['uID'];
                $username = $row['Username'];
                $name = $row['Name'];
                $surname = $row['Surname'];
                $email = $row['Email'];
                $tel = $row['PhoneNumber'];
                $password = $row['Password'];

                $uData = [$id, $username, $name, $surname, $email, $tel, $password];
                return $uData;
            }
        }
    }
}