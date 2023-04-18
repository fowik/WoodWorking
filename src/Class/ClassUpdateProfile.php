<?php

namespace App\Class;

use App\DatabaseConnection;

class ClassUpdateProfile extends DatabaseConnection{
    public static function updateProfile($data) {
        $conn = new DatabaseConnection();

        $id = $data['id'];
        $name = $data['name'];
        $surname = $data['surname'];
        $email = $data['email'];
        $tel = $data['tel'];

        $sql = "UPDATE `user` SET `Name` = '$name', `Surname` = '$surname', `Email` = '$email', `PhoneNumber` = '$tel' WHERE `uID` = '$id'";
        $conn->execute($sql);
    }
}

?>