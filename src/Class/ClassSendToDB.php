<?php

namespace App\Class;

use App\DatabaseConnection;
use App\Class\ClassRegisterForm;

class ClassSendToDB extends DatabaseConnection {
    public function sendToDB(){
        if (! empty($_POST)) {
            $conn = DatabaseConnection::__construct();

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } else {
                $obj = new ClassRegisterForm();
                $username = $obj->get_uData()[0];
                $name = $obj->get_uData()[1];
                $surname = $obj->get_uData()[2];
                $email = $obj->get_uData()[3];
                $tel = $obj->get_uData()[4];
                $password = $obj->get_uData()[5];
                $admin = $obj->get_uData()[6];

                $sql = "INSERT INTO `user` (`Password`, `Name`, `Surname`, `Username`, `Email`, `PhoneNumber`, `isAdmin`) 
                VALUES ('$password', '$name', '$surname', '$username', '$email', '$tel', '$admin')";
                $conn->exec($sql);

                $_SESSION["message"] = 'Profils ir veiksmīgi izveidots!';
                header("Location: /login");
                exit();
            }
        }
    }
}