<?php

namespace App\Class;

use App\DatabaseConnection;
use Laminas\Diactoros\Response\JsonResponse;

class ClassCart {
    function displayCart() {
        $conn = new DatabaseConnection();

        $uID = $_SESSION['user']['id'];

        $sql = "SELECT 
            product.prodID,
            product.Price * ordering.Quantity AS Total,
            product.Title,
            product.Price,
            ordering.Quantity
        FROM ordering INNER JOIN product ON ordering.prodID = product.prodID WHERE userID = $uID";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $cart = $stmt->fetchALL(\PDO::FETCH_ASSOC);

        return $cart;
    }

    function deleteFromCart() {
        $conn = new DatabaseConnection();

        $prodID = $_POST['prodID'];
        $uID = $_SESSION['user']['id'];

        $sql = "DELETE FROM ordering WHERE prodID = $prodID AND userID = $uID";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    function updateCart() {
        $conn = new DatabaseConnection();

        $prodID = $_POST['productId'];
        $uID = $_SESSION['user']['id'];
        $quantity = $_POST['quantity'];

        $sql = "UPDATE ordering SET Quantity = $quantity WHERE prodID = $prodID AND userID = $uID";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $sql = 
        "SELECT 
            product.prodID, 
            product.Title, 
            product.Price, 
            ordering.Quantity, 
            (product.Price * ordering.Quantity) as ProductTotal 
        FROM product 
        INNER JOIN ordering 
            ON ordering.prodID = product.prodID
        WHERE ordering.prodID = $prodID and ordering.userID = $uID;
        ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}