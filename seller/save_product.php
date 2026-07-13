<?php

session_start();

require_once "../config/database.php";

if(!isset($_SESSION['user_id'])){

    header("Location: ../auth/login.php");
    exit();

}

if($_SERVER["REQUEST_METHOD"]=="POST"){

echo "<pre>";
print_r($_FILES);
echo "</pre>";
exit();

    $seller_id = $_SESSION['user_id'];

    $product_name = trim($_POST['product_name']);
    $description = trim($_POST['description']);
    $category = trim($_POST['category']);
    $size = trim($_POST['size']);
    $price = $_POST['price'];

    $image = "";

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){

        $imageName = time() . "_" . basename($_FILES['image']['name']);

        $target = "../uploads/products/" . $imageName;

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){

            $image = $imageName;

        }

    }

    $stmt = $pdo->prepare("

        INSERT INTO products

        (seller_id, product_name, description, category, size, price, image)

        VALUES

        (?, ?, ?, ?, ?, ?, ?)

    ");

    $stmt->execute(array(

        $seller_id,
        $product_name,
        $description,
        $category,
        $size,
        $price,
        $image

    ));

    header("Location: my_products.php");
    exit();

}

?>