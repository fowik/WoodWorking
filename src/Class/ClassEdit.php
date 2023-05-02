<?php

namespace App\Class;

use App\DatabaseConnection;

class ClassEdit {
    public function getTypes() {
        $conn = new DatabaseConnection();

        $id = $_GET['catID'];

        $sql = "SELECT * FROM producttype WHERE catID != :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);

        $type = $stmt->fetchALL();

        return $type;
    }

    public function getProd() {
        $conn = new DatabaseConnection();

        $id = $_GET['prodID'];

        $sql = "SELECT * FROM product INNER JOIN producttype ON product.catID = producttype.catID WHERE prodID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);

        $prod = $stmt->fetch();
        return $prod;
    }

    public function editProd() {
        $conn = new DatabaseConnection();
        $conn->getConnection();
        
        $id = $_POST['prodID'];
        $title = $_POST['title'];
        $type = $_POST['catID'];
        $price = $_POST['price'];
        $desc = $_POST['description'];

        $sql = "UPDATE product SET Title = :name, Price = :price, Description = :desc, catID = :type WHERE prodID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'name' => $title, 
            'price' => $price, 
            'desc' => $desc, 
            'type' => $type, 
            'id' => $id
        ]);
    }

    public function getUser() {
        $conn = new DatabaseConnection();

        $id = $_GET['uID'];

        $sql = "SELECT * FROM user WHERE uID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);

        $user = $stmt->fetch();

        return $user;
    }

    public function editUser() {
        $conn = new DatabaseConnection();

        $id = $_POST['uID'];

        $sql = "UPDATE user SET Username = :username, Email = :email, Name = :name, Surname = :surname, PhoneNumber = :number WHERE uID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['username' => $_POST['username'], 'email' => $_POST['email'], 'name' => $_POST['name'], 'surname' => $_POST['surname'], 'number' => $_POST['number'], 'id' => $id]);
        header("Location: /control-panel");
    }


}