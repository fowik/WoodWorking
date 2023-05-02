<?php

namespace App\Class;

use App\DatabaseConnection;

class ClassCatalog {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->getConnection();
    }
    
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
        $obj = new DatabaseConnection();
        $conn = $obj->getConnection();
    
        $prodID = $_POST['prodID'];
        $quantity = (int)$_POST['quantity'];
        $price = $_POST['price'];
        $total = $quantity * $price;
    
        $uID = $_SESSION['user']['id'];
        $status = 'In Cart';
    
        // $conn->beginTransaction();
    
        // Check if user has an existing cart
        $sql = "SELECT orders.OrderID, SUM(orderitems.Total) as TotalPrice 
                FROM orders 
                LEFT JOIN orderitems ON orders.OrderID = orderitems.OrderID 
                WHERE orders.uID = :uID AND orders.Status = :status
                GROUP BY orders.OrderID";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['uID' => $uID, 'status' => $status]);
        $cart = $stmt->fetch();
    
        if (!$cart) {
            // Create a new cart
            $sql = "INSERT INTO orders (uID, OrderDate, Status, TotalPrice) 
                    VALUES (:uID, NOW(), :status, :total)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['uID' => $uID, 'status' => $status, 'total' => $total]);
    
            $cartID = $conn->lastInsertId();
            $sql = "INSERT INTO orderitems (prodID, OrderID, Quantity, Total) 
                    VALUES (:prodID, :cartID, :quantity, :total)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['prodID' => $prodID, 'cartID' => $cartID, 'quantity' => $quantity, 'total' => $total]);
    
            $_SESSION['message'] = "Added to cart";
            header("Location: /catalog/product?prodID=$prodID");
        } else {
            // Update existing cart
            $cartID = $cart['OrderID'];
    
            // Check if the product is already in the cart
            $sql = "SELECT * FROM orderitems WHERE OrderID = :cartID AND prodID = :prodID";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['cartID' => $cartID, 'prodID' => $prodID]);
            $item = $stmt->fetch();
    
            if ($item) {
                // Update existing item
                $sql = "UPDATE orderitems SET Quantity = :quantity, Total = :total 
                        WHERE prodID = :prodID AND OrderID = :cartID";
                $stmt = $conn->prepare($sql);
                $stmt->execute(['quantity' => $quantity, 'total' => $total, 'prodID' => $prodID, 'cartID' => $cartID]);
            } else {
                // Add new item
                $sql = "INSERT INTO orderitems (prodID, OrderID, Quantity, Total) 
                        VALUES (:prodID, :cartID, :quantity, :total)";
                $stmt = $conn->prepare($sql);
                $stmt->execute(['prodID' => $prodID, 'cartID' => $cartID, 'quantity' => $quantity, 'total' => $total]);
            }
            
            // Update total price
            $sql = "UPDATE orders 
            SET TotalPrice = (SELECT SUM(Total) 
                            FROM orderitems 
                            WHERE OrderID = :cartID) 
            WHERE OrderID = :cartID";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['cartID' => $cartID]);

            $_SESSION['message'] = "Added to cart";
            header("Location: /catalog/product?prodID=$prodID");
        }
    }
}