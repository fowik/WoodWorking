<?php

namespace App\Class;

use App\DatabaseConnection;

class ClassAdd {
    public function addProd() {
        if (! empty($_POST)){
            $conn = new DatabaseConnection();
            
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['catID'];
            $img_type = substr($_FILES['image']['type'], 0, 5);
            $img_size = 10*1024*1024;

            $sql = "SELECT * FROM `product` WHERE `Title` = '$title'";
            $result = $conn->query($sql);
            if ($result->rowCount() > 0 && $title != "" && $title != null && $description != "" && $description != null && $price != "" && $price != null && $category != "" && $category != null) {
                $_SESSION['message'] = "Šāds produkts jau eksistē!";
            } else {
                if (!empty($_FILES['image']['tmp_name']) && $img_type ==='image' && $_FILES['image']['size'] <= $img_size) { 
                    $img = file_get_contents($_FILES['image']['tmp_name']);
                    $stmt = $conn->prepare("INSERT INTO `product` (`Title`, `Description`, `Price`, `Image`, `catID`) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bindParam(1, $title);
                    $stmt->bindParam(2, $description);
                    $stmt->bindParam(3, $price);
                    $stmt->bindParam(4, $img);
                    $stmt->bindParam(5, $category);
                    $stmt->execute();
                    $_SESSION['message'] = "Produkts pievienots!";
                } else {
                    $_SESSION['message'] = 'Lūdzu aizpildiet visus laukus!';
                }
            }
        } 
    }

    public function addType() {
        if (! empty($_POST)){
            $conn = new DatabaseConnection();

            $type = $_POST['type'];
            $sql = "SELECT * FROM producttype WHERE type = '$type'";
            $result = $conn->query($sql);
            
            if ($type != "" && $type != null && $result->rowCount() === 0){
                $conn->query("INSERT INTO `producttype` (`type`) VALUES ('$type')");
            } else {
                $_SESSION['message'] = "Šī kategorija jau eksistē!";
            }
        } else {
            $_SESSION['message'] = 'Lūdzu aizpildiet visus laukus!';
        }
    }

    public function getTypes() {
        $conn = new DatabaseConnection();

        $sql = "SELECT * FROM producttype";
        $result = $conn->query($sql);
        
        return $result->fetchAll();
    }

    
}