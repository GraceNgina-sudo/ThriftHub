<?php

session_start();

if(!isset($_SESSION['user_id'])){

    header("Location: ../auth/login.php");
    exit();

}

require_once "../config/database.php";

include "../includes/header.php";
include "../includes/navbar.php";

$stmt = $pdo->prepare("SELECT * FROM products WHERE seller_id = ?");

$stmt->execute(array($_SESSION['user_id']));

$products = $stmt->fetchAll();

?>

<div class="container dashboard">

    <h1>My Products</h1>

    <div class="dashboard-buttons">

        <a href="add_product.php" class="register-btn">
            + Add Another Product
        </a>

        <a href="dashboard.php" class="login-btn">
            Dashboard
        </a>

    </div>

    <?php if(count($products) > 0){ ?>

    <table class="products-table">

        <tr>

            <th>Image</th>
            <th>Product</th>
            <th>Category</th>
            <th>Size</th>
            <th>Price</th>

        </tr>

        <?php foreach($products as $product){ ?>

        <tr>

            <td>

                <?php

                if(!empty($product['image']) && file_exists("../uploads/products/".$product['image'])){

                ?>

                    <img src="../uploads/products/<?php echo $product['image']; ?>" alt="Product">

                <?php

                }else{

                ?>

                    <img src="../uploads/products/shirt2.jpg" alt="No Image">

                <?php

                }

                ?>

            </td>

            <td><?php echo htmlspecialchars($product['product_name']); ?></td>

            <td><?php echo htmlspecialchars($product['category']); ?></td>

            <td><?php echo htmlspecialchars($product['size']); ?></td>

            <td>KES <?php echo number_format($product['price'],2); ?></td>

        </tr>

        <?php } ?>

    </table>

    <?php } else { ?>

        <div class="empty-products">

            <h2>No Products Yet</h2>

            <p>You haven't uploaded any products.</p>

            <a href="add_product.php" class="register-btn">

                Upload Your First Product

            </a>

        </div>

    <?php } ?>

</div>

<?php include "../includes/footer.php"; ?>