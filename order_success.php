<?php

session_start();

include "includes/header.php";
include "includes/navbar.php";

?>

<section class="success-page">

<div class="container">

<div class="success-card">

<h1>🎉 Order Successful!</h1>

<p>

Thank you for shopping with ThriftHub.

</p>

<h2>

Order Number

</h2>

<p>

<?php echo $_SESSION['order_number']; ?>

</p>

<br>

<a
href="shop.php"
class="register-btn">

Continue Shopping

</a>

</div>

</div>

</section>

<?php include "includes/footer.php"; ?>