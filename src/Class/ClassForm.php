<?php

namespace App\Class;

use App\DatabaseConnection;
use mysqli;

class ClassForm extends DatabaseConnection {
    // public $username;
    // public $email;
    // public $tel;
    // public $password;
    // public $password_confirm;
    
    // function __construct($username, $email, $tel, $password, $password_confirm)
    // {
    //     $this->username = $username;
    //     $this->email = $email;
    //     $this->tel = $tel;
    //     $this->password = $password;
    //     $this->password_confirm = $password_confirm;
    // }

    public function get_uData() {
        $conn = $this->__construct();

        if (! empty($_POST)) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $tel = $_POST['number'];
            $password = $_POST['password'];
            $password_confirm = $_POST['confirm_password'];

            if (empty($username) || empty($email) || empty($tel) || empty($password) || empty($password_confirm)) {
                $_SESSION["message"] = 'Lūdzu, aizpildiet visus laukus!';
                header("Location: /register");
                exit();
            } 

            if (strlen($username) < 3) {
                $_SESSION["message"] = 'Lietotājvārds ir pārāk īss!';
                header("Location: /register");
                exit();
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION["message"] = 'Lūdzu, ievadiet derīgu e-pasta adresi!';
                header("Location: /register");
                exit();
            }

            if (strlen($password) < 8) {
                $_SESSION["message"] = 'Parole ir pārāk īsa!';
                header("Location: /register");
                exit();
            }

            if (strlen($tel) < 7) {
                $_SESSION["message"] = 'Telefona numurs ir pārāk īss!';
                header("Location: /register");
                exit();
            }

            $sql = "SELECT * FROM `user` WHERE `username` = '$username'";
            $stmt = $conn->query($sql)->rowCount();
            if ($stmt > 0) {
                $_SESSION["message"] = 'Lietotājvārds jau ir aizņemts!';
                header("Location: /register");
                exit();
            }

            $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
            $stmt = $conn->query($sql)->rowCount();
            if ($stmt > 0) {
                $_SESSION["message"] = 'E-pasts jau ir aizņemts!';
                header("Location: /register");
                exit();
            }
            
            $sql = "SELECT * FROM `user` WHERE `number` = '$tel'";
            $stmt = $conn->query($sql)->rowCount();
            if ($stmt > 0) {
                $_SESSION["message"] = 'Telefona numurs jau ir aizņemts!';
                header("Location: /register");
                exit();
            }

            if ($password === $password_confirm) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $dArr = [$username, $email, $tel, $password];
                return $dArr;
            } else {
                $_SESSION["message"] = 'Jūsu paroles nesakrīt!';
                header("Location: /register");
                exit();
            }
        }
    }
}