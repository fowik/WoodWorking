<?php

namespace App\Class;

use App\DatabaseConnection;
use App\Class\ClassForm;

class ClassSendToDB extends DatabaseConnection {
    public function sendToDB(){
        if (! empty($_POST)) {
            $conn = $this->__construct();

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } else {
                $obj = new ClassForm();
                $username = $obj->get_uData()[0];
                $email = $obj->get_uData()[1];
                $tel = $obj->get_uData()[2];
                $password = $obj->get_uData()[3];
                
                $sql = "INSERT INTO `user` (`username`, `email`, `number`,`password`) VALUES ('$username', '$email', '$tel', '$password')";
                $conn->exec($sql);
            }
        }
    }
}