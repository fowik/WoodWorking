<?php

namespace App\Class;

use App\DatabaseConnection;

class ClassDelete {
    function deleteProduct() {
        $conn = new DatabaseConnection();
        $id = $_POST['prodID'];

        $conn->query("DELETE FROM `product` WHERE `prodID` = '$id'");
    }

    function deleteUser() {
        $conn = new DatabaseConnection();
        $id = $_POST['uID'];

        $conn->query("DELETE FROM `user` WHERE `uID` = '$id'");
    }
}