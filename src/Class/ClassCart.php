<?php

namespace App\Class;

use App\DatabaseConnection;
use Laminas\Diactoros\Response\JsonResponse;

class ClassCart {
    function displayCart() {
        $conn = new DatabaseConnection();
    
        $uID = $_SESSION['user']['id'];
    
        $sql = "SELECT * FROM orders 
        INNER JOIN orderitems 
            ON orders.orderID = orderitems.orderID 
        INNER JOIN product
            ON orderitems.prodID = product.prodID
        WHERE orders.uID = $uID AND orders.Status = 'In Cart'";
        $stmt = $conn->query($sql);
    
        $cart = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
        if (count($cart) > 0) {
            return $cart;
        } else {
            return [];
        }
    }

    function deleteFromCart() {
        $conn = new DatabaseConnection;
        $conn->getConnection();

        $prodID = $_POST['prodID'];
        $uID = $_SESSION['user']['id'];

        $sql = "SELECT * FROM orders 
        INNER JOIN orderitems 
            ON orders.orderID = orderitems.orderID 
        INNER JOIN product
            ON orderitems.prodID = product.prodID
        WHERE orders.uID = $uID AND orderitems.prodID = $prodID";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $cart = $stmt->fetchALL(\PDO::FETCH_ASSOC);

        $cartID = $cart[0]['OrderID'];

        $sql = "DELETE FROM orderitems WHERE prodID = $prodID AND OrderID = $cartID";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    function updateCart() {
        $conn = new DatabaseConnection();

        $prodID = $_POST['productId'];
        $uID = $_SESSION['user']['id'];
        $quantity = $_POST['quantity'];

        // Update Quantity
        $sql = "SELECT Price FROM product WHERE prodID = $prodID";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $price = $stmt->fetch();
        $price = $price['Price'];

        $total = $quantity * $price;

        $orderID = "SELECT OrderID FROM orders WHERE uID = $uID AND Status = 'In Cart'";
        $stmt = $conn->prepare($orderID);
        $stmt->execute();
        $order = $stmt->fetch();

        $cartID = $order['OrderID'];

        $sql = "UPDATE orderitems SET Quantity = :quantity, Total = :total 
            WHERE prodID = :prodID AND OrderID = :cartID AND OrderID IN (
                SELECT OrderID FROM orders 
                    WHERE Status = 'In Cart'
            );";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['quantity' => $quantity, 'total' => $total, 'prodID' => $prodID, 'cartID' => $cartID]);

        // Update Total Price
        $sql = "UPDATE orders 
        SET TotalPrice = (SELECT SUM(Total) 
            FROM orderitems 
            WHERE OrderID = :cartID) 
        WHERE OrderID = :cartID AND orders.Status = :status";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['cartID' => $cartID, 'status' => 'In Cart']);
        
        $sql = 
        "SELECT 
            orders.orderID,
            product.prodID,
            product.Title,
            product.Price,
            orderitems.Quantity,
            (product.Price * orderitems.Quantity) as ProductTotal
        FROM orders 
        INNER JOIN orderitems 
            ON orders.orderID = orderitems.orderID 
        INNER JOIN product
            ON orderitems.prodID = product.prodID
        WHERE orders.uID = $uID AND orderitems.prodID = $prodID and orders.Status = 'In Cart';
        ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function ConfirmOrder() 
    {
        $obj = new DatabaseConnection();
        $obj->getConnection();

        $uID = $_SESSION['user']['id'];

        $sql = "SELECT * FROM orders WHERE uID = :uID AND Status = :status";
        $stmt = $obj->prepare($sql);
        $stmt->execute(['uID' => $uID, 'status' => 'In Cart']);
        $stmt = $stmt->rowCount();

        if($stmt > 0) {
            $sql = "UPDATE orders SET Status = :status WHERE uID = :uID AND Status = :status2";
            $stmt = $obj->prepare($sql);
            $stmt->execute(['status' => 'Checking', 'uID' => $uID, 'status2' => 'In Cart']);
        }

        header('Location: /cart');
    }
    
}