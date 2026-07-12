<?php

session_start();

if(!isset($_SESSION['user_id'])){

    header("Location: ../auth/login.php");
    exit();

}

include "../includes/header.php";
include "../includes/navbar.php";

?>

<div class="container" style="padding:50px;">

<h1>Seller Dashboard</h1>

<br>

<a href="add_product.php" class="register-btn">

+ Add Product

</a>

<br><br>

<a href="my_products.php" class="login-btn">

View My Products

</a>

</div>

<?php include "../includes/footer.php"; ?>