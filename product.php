<?php

session_start();

require_once "config/database.php";

include "includes/header.php";
include "includes/navbar.php";

if(!isset($_GET['id'])){

    header("Location: shop.php");
    exit();

}

$id = intval($_GET['id']);

$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");

$stmt->execute(array($id));

$product = $stmt->fetch();

if(!$product){

    echo "<div class='container'><h2>Product not found.</h2></div>";

    include "includes/footer.php";

    exit();

}

?>

<section class="product-details">

<div class="container product-container">

<div class="product-image">

<img src="uploads/products/<?php echo $product['image']; ?>">

</div>

<div class="product-content">

<span class="product-category">

<?php echo htmlspecialchars($product['category']); ?>

</span>

<h1>

<?php echo htmlspecialchars($product['product_name']); ?>

</h1>

<h2 class="price">

KES <?php echo number_format($product['price'],2); ?>

</h2>

<p>

<?php echo nl2br(htmlspecialchars($product['description'])); ?>

</p>

<p>

<strong>Size:</strong>

<?php echo htmlspecialchars($product['size']); ?>

</p>

<p>

<strong>Condition:</strong>

<?php echo htmlspecialchars($product['condition_item']); ?>

</p>

<br>

<a href="cart.php?id=<?php echo $product['id']; ?>" class="register-btn">

Add To Cart

</a>

<a href="shop.php" class="login-btn">

Back To Shop

</a>

</div>

</div>

</section>

<?php include "includes/footer.php"; ?>