<?php

session_start();

include "../includes/header.php";
include "../includes/navbar.php";

?>

<div class="auth-container">

<form
class="auth-form"
action="save_product.php"
method="POST"
enctype="multipart/form-data">

<h2>Add Product</h2>

<input
type="text"
name="product_name"
placeholder="Product Name"
required>

<textarea
name="description"
placeholder="Description"
required></textarea>

<input
type="text"
name="category"
placeholder="Category">

<input
type="text"
name="size"
placeholder="Size">

<input
type="number"
step="0.01"
name="price"
placeholder="Price">

<input
type="file"
name="image"
required>

<button>

Save Product

</button>

</form>

</div>

<?php include "../includes/footer.php"; ?>