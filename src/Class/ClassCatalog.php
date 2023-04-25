<?php

namespace App\Class;

use App\DatabaseConnection;

class ClassCatalog {
    public function getProd() {
        $conn = new DatabaseConnection();

        $prodID = $_GET['prodID'];

        $sql = "SELECT * FROM product INNER JOIN producttype ON product.catID = producttype.catID WHERE product.prodID = $prodID";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $prod = $stmt->fetch();

        return $prod;
    }
    public function getTypes() {
        $conn = new DatabaseConnection();

        $sql = "SELECT * FROM producttype";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $type = $stmt->fetchALL();

        return $type;
    }

    public function getProdWType() {
        $conn = new DatabaseConnection();

        $sql = "SELECT * FROM producttype INNER JOIN product ON producttype.catID = product.catID";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $type = $stmt->fetchALL();

        return $type;
    }

    public function addToCart() {
        $conn = new DatabaseConnection();

        $prodID = $_POST['prodID'];
        $quantity = $_POST['quantity'];
        $uID = $_SESSION['user']['id'];

        echo $prodID;
        echo $quantity;
        echo $uID;
        $sql = "SELECT * FROM ordering WHERE prodID = $prodID AND userID = $uID";
        $stmt = $conn->query($sql)->rowCount();
        if ($stmt > 0) {
            $sql = "UPDATE ordering SET Quantity = $quantity WHERE prodID = $prodID AND userID = $uID";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $_SESSION['message'] = "Updated in cart";
            header("Location: /catalog/product?prodID=$prodID");
        } else {
            $sql = "INSERT INTO ordering (prodID, userID, Quantity) VALUES ($prodID, $uID, $quantity)";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $_SESSION['message'] = "Added to cart";
            header("Location: /catalog/product?prodID=$prodID");
        }
    }
}