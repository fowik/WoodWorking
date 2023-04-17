<?php

namespace App\Class;

use App\DatabaseConnection;

class ClassRegisterForm extends DatabaseConnection {
    private $username;
    private $email;
    private $tel;
    private $password;
    private $password_confirm;
    private $isAdmin;
    
    public function __construct(){
        $this->username = $_POST['username'];
        $this->email = $_POST['email'];
        $this->tel = $_POST['number'];
        $this->password = $_POST['password'];
        $this->password_confirm = $_POST['confirm_password'];
        $this->isAdmin = true;
    }

    public function get_uData() {
        $conn = DatabaseConnection::__construct();

        if (! empty($_POST)) {
            $username = $this->username;
            $email = $this->email;
            $tel = $this->tel;
            $password = $this->password;
            $password_confirm = $this->password_confirm;

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

            $sql = "SELECT * FROM `user` WHERE `PhoneNumber` = '$tel'";
            $stmt = $conn->query($sql)->rowCount();
            if ($stmt > 0) {
                $_SESSION["message"] = 'Telefona numurs jau ir aizņemts!';
                header("Location: /register");
                exit();
            }

            if ($password === $password_confirm) {
                $sql = "SELECT * FROM `user`";
                $stmt = $conn->query($sql)->rowCount();
                if ($stmt > 0) {
                    $isAdmin = false;
                    $password = password_hash($password, PASSWORD_DEFAULT);
                
                    $dArr = [$username, $email, $tel, $password, $isAdmin];
                    return $dArr;
                } else {
                    $isAdmin = true;
                    $password = password_hash($password, PASSWORD_DEFAULT);
                
                    $dArr = [$username, $email, $tel, $password, $isAdmin];
                    return $dArr;
                }
            } else {
                $_SESSION["message"] = 'Jūsu paroles nesakrīt!';
                header("Location: /register");
                exit();
            }
        }
    }
}