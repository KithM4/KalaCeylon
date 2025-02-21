<?php

include('server/connection.php');

// search part
if (isset($_POST['search'])) {

    // get  current page number 
    $page_no = isset($_GET['page_no']) ? $_GET['page_no'] : 1;

    // get category and price 
    $category = $_POST['category'];
    $price = $_POST['price'];

    $stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM products WHERE product_category=? AND product_price<=?");
    $stmt1->bind_param('si', $category, $price);
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();

    $total_records_per_page = 6;
    $offset = ($page_no - 1) * $total_records_per_page;
    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    $stmt2 = $conn->prepare("
        SELECT p.*, 
               (SELECT COUNT(*) FROM order_items oi WHERE oi.product_id = p.product_id) AS sold_count
        FROM products p
        
        WHERE p.product_category = ? AND p.product_price <= ? 
        LIMIT ?, ?");
    $stmt2->bind_param("siii", $category, $price, $offset, $total_records_per_page);
    $stmt2->execute();
    $products = $stmt2->get_result();

} else {
    // load all products

    $page_no = isset($_GET['page_no']) ? $_GET['page_no'] : 1;

    $stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM products");
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();

    $total_records_per_page = 6;
    $offset = ($page_no - 1) * $total_records_per_page;
    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    $stmt2 = $conn->prepare("
        SELECT p.*, 
               (SELECT COUNT(*) FROM order_items oi WHERE oi.product_id = p.product_id) AS sold_count
        FROM products p
        LIMIT ?, ?");
    $stmt2->bind_param("ii", $offset, $total_records_per_page);
    $stmt2->execute();
    $products = $stmt2->get_result();
}
?>

<!-- Header -->
<?php include('layouts/header.php'); ?>

<style>
    .product img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .pagination a {
        color: coral;
    }

    .pagination li:hover a {
        color: #fff;
        background-color: coral;
    }

    @media (max-width: 991px) {
        aside {
            position: relative !important;
            top: auto !important;
        }
    }
</style>

<!-- Main Content -->
<div class="container mt-5 py-5">
    <div class="row" style="min-height: 800px;">

        <!-- Sidebar: Product Search -->
        <aside class="col-lg-3 col-md-4 d-none d-md-block">
            <div class="p-3 bg-white position-sticky" style="top: 100px;">
                <form action="shop.php" method="POST">
                    <p class="fw-bold">Category</p>

                    <!-- Category Selection  -->
                    <div class="form-check">
                        <input class="form-check-input" value="arts" type="radio" name="category" id="category_one" <?php if (isset($category) && $category == 'arts') { echo 'checked'; } ?>>
                        <label class="form-check-label">Paintings</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="antique" type="radio" name="category" id="category_two" <?php if (isset($category) && $category == 'antique') { echo 'checked'; } ?>>
                        <label class="form-check-label">Antiques</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="handmade" type="radio" name="category" id="category_three" <?php if (isset($category) && $category == 'handmade') { echo 'checked'; } ?>>
                        <label class="form-check-label">Handmade</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="handmade" type="radio" name="category" id="category_four" <?php if (isset($category) && $category == 'handmade') { echo 'checked'; } ?>>
                        <label class="form-check-label">Rare Currency</label>
                    </div>

                    <!-- Price Range Slider -->
                    <p class="fw-bold mt-3">Price Range</p>
                    <input type="range" class="form-range" name="price" value="<?php echo isset($price) ? $price : '100'; ?>" min="1" max="1000" id="customPrice">
                    <div class="d-flex justify-content-between">
                        <span>1 LKR</span>
                        <span>100000 LKR</span>
                    </div>

                    <!-- Search Button -->
                    <div class="d-grid my-3">
                        <button type="submit" name="search" class="btn btn-secondary">🔍 Search</button>
                    </div>
                </form>
            </div>
        </aside>

        <!-- Product Display Section -->
        <section class="col-lg-9 col-md-8">
            <div class="container mt-3 py-3">
                <h3>Our Products</h3>
                <hr>
                <p>Here you can check out our new featured products</p>
            </div>

            <div class="row mx-auto container">

                <?php while ($row = $products->fetch_assoc()) { ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="product text-center shadow-sm p-3 bg-white rounded">
                            <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
                            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                            <h4 class="p-price"><?php echo $row['product_price']; ?> LKR</h4>

                            <!-- product is sold out -->
                            <?php if ($row['sold_count'] > 0) { ?>
                                <button class="btn btn-danger" disabled>🚫 Sold Out</button>
                            <?php } else { ?>
                                <a class="btn buy-btn" href="single_product.php?product_id=<?php echo $row['product_id']; ?>">🛒 Buy Now</a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- Pagination Navigation -->
            <nav aria-label="Page navigation" class="mx-auto">
                <ul class="pagination mt-5 mx-auto">
                    <li class="page-item <?php if ($page_no <= 1) { echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if ($page_no <= 1) { echo '#'; } else { echo "?page_no=" . ($page_no - 1); } ?>">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
                    <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>
                    <li class="page-item <?php if ($page_no >= $total_no_of_pages) { echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if ($page_no >= $total_no_of_pages) { echo '#'; } else { echo "?page_no=" . ($page_no + 1); } ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </section>
    </div>
</div>

<!-- Include Footer -->
<?php include('layouts/footer.php'); ?>
