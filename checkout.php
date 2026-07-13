<?php

session_start();

if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){

    header("Location: cart.php");
    exit();

}

include "includes/header.php";
include "includes/navbar.php";

?>

<section class="checkout">

<div class="container">

<div class="checkout-form">

<h2>Checkout</h2>

<form action="place_order.php" method="POST">

<label>Full Name</label>

<input
type="text"
name="full_name"
required>

<label>Phone Number</label>

<input
type="text"
name="phone"
required>

<label>Email</label>

<input
type="email"
name="email"
required>

<label>Delivery Address</label>

<textarea
name="address"
rows="5"
required></textarea>

<button
type="submit"
class="register-btn">

Place Order

</button>

</form>

</div>

</div>

</section>

<?php include "includes/footer.php"; ?>