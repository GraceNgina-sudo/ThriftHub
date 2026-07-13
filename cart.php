<?php

session_start();

require_once "config/database.php";

if(!isset($_SESSION['cart'])){

    $_SESSION['cart'] = array();

}

if(isset($_GET['id'])){

    $id = intval($_GET['id']);

    if(isset($_SESSION['cart'][$id])){

        $_SESSION['cart'][$id]++;

    }else{

        $_SESSION['cart'][$id] = 1;

    }

    header("Location: cart.php");
    exit();

}

include "includes/header.php";
include "includes/navbar.php";

?>

<section class="cart-page">

<div class="container">

<h2>Shopping Cart</h2>

<?php

$total = 0;

if(count($_SESSION['cart']) > 0){

?>

<table class="cart-table">

<tr>

<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>
<th></th>

</tr>

<?php

foreach($_SESSION['cart'] as $id=>$qty){

$stmt = $pdo->prepare("SELECT * FROM products WHERE id=?");
$stmt->execute(array($id));

$product = $stmt->fetch();

if($product){

$subtotal = $product['price'] * $qty;

$total += $subtotal;

?>

<tr>

<td>

<?php echo htmlspecialchars($product['product_name']); ?>

</td>

<td>

KES <?php echo number_format($product['price'],2); ?>

</td>

<td>

<?php echo $qty; ?>

</td>

<td>

KES <?php echo number_format($subtotal,2); ?>

</td>

<td>

<a href="remove_cart.php?id=<?php echo $id; ?>">

Remove

</a>

</td>

</tr>

<?php

}

}

?>

</table>

<h2>

Grand Total:

KES <?php echo number_format($total,2); ?>

</h2>

<br>

<a href="checkout.php" class="register-btn">

Proceed To Checkout

</a>

<?php

}else{

?>

<div class="empty-products">

<h2>Your cart is empty.</h2>

<p>

Browse products and start shopping.

</p>

<a href="shop.php" class="register-btn">

Go Shopping

</a>

</div>

<?php

}

?>

</div>

</section>

<?php include "includes/footer.php"; ?>