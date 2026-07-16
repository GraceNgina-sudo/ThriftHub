<?php

session_start();

require_once "config/database.php";

include "includes/header.php";
include "includes/navbar.php";

$search = "";

$category = "";

$size = "";

$sql = "SELECT * FROM products WHERE 1";

$params = array();

if(isset($_GET['search']) && $_GET['search'] != ""){

    $search = trim($_GET['search']);

    $sql .= " AND product_name LIKE ?";

    $params[] = "%" . $search . "%";

}

if(isset($_GET['category']) && $_GET['category'] != ""){

    $category = trim($_GET['category']);

    $sql .= " AND category = ?";

    $params[] = $category;

}

if(isset($_GET['size']) && $_GET['size'] != ""){

    $size = trim($_GET['size']);

    $sql .= " AND size = ?";

    $params[] = $size;

}

$sql .= " ORDER BY id DESC";

$stmt = $pdo->prepare($sql);

$stmt->execute($params);

$products = $stmt->fetchAll();

?>

<section class="featured-products">

    <div class="container">

        <div class="section-header">

            <h2>Shop All Products</h2>

            <p>
                Browse quality thrift fashion from trusted sellers across Kenya.
            </p>

        </div>
    <div class="shop-filters">

<form method="GET" action="shop.php">

<input
type="text"
name="search"
placeholder="Search products...">

<select name="category">

<option value="">All Categories</option>

<option>Dresses</option>

<option>Tops</option>

<option>Jeans</option>

<option>Jackets</option>

<option>Shoes</option>

<option>Bags</option>

<option>Shirts</option>

</select>

<select name="size">

<option value="">All Sizes</option>

<option>XS</option>

<option>S</option>

<option>M</option>

<option>L</option>

<option>XL</option>

</select>

<button type="submit" class="register-btn">

Search

</button>

</form>

</div>

        <?php if(count($products) > 0){ ?>

        <div class="products-grid">

            <?php foreach($products as $product){ ?>

            <div class="product-card">

                <?php

                $image = "uploads/" . $product['image'];

                 if(!empty($product['image'])){

                ?>

                    <img src="<?php echo $image; ?>"
                         alt="<?php echo htmlspecialchars($product['product_name']); ?>">

                <?php

                }else{

                ?>

                    <img src="uploads/shirt1.jpg" alt="No Image">
                        

                <?php

                }

                ?>

                <div class="product-info">

                    <span class="product-category">

                        <?php echo htmlspecialchars($product['category']); ?>

                    </span>

                    <h3>

                        <?php echo htmlspecialchars($product['product_name']); ?>

                    </h3>

                    <p class="price">

                        KES <?php echo number_format($product['price'],2); ?>

                    </p>

                    <p>

                        Size:
                        <strong>

                            <?php echo htmlspecialchars($product['size']); ?>

                        </strong>

                    </p>

                    <a href="product.php?id=<?php echo $product['id']; ?>"
                       class="view-btn">

                        View Product

                    </a>

                </div>

            </div>

            <?php } ?>

        </div>

        <?php } else { ?>

        <div class="empty-products">

            <h2>No Products Available</h2>

            <p>

                Sellers haven't uploaded any products yet.

            </p>

        </div>

        <?php } ?>

    </div>

</section>

<?php include "includes/footer.php"; ?>