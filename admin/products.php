<?php include('header.php'); ?>

<?php

if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php');
    exit();
}


if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1; 
}

$stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM products");
$stmt1->execute();
$stmt1->bind_result($total_records);
$stmt1->store_result();
$stmt1->fetch();

// Pagination setup
$total_records_per_page = 6;
$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$total_no_of_pages = ceil($total_records / $total_records_per_page);

// Retrieve products for the current page
$stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset, $total_records_per_page");
$stmt2->execute();
$products = $stmt2->get_result();
?>

<div class="container-fluid">
    <div class="row" style="min-height: 1000px;">
        <?php include('sidemenu.php'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h2 class="mt-3">Products</h2>

            <!-- Display success or error messages if set -->
            <?php if (isset($_GET['edit_success_message'])) { ?>
                <p class="text-center" style="color: green;"><?php echo $_GET['edit_success_message']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['edit_failure_message'])) { ?>
                <p class="text-center" style="color:red;"><?php echo $_GET['edit_failure_message']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['deleted_failure_message'])) { ?>
                <p class="text-center" style="color:red;"><?php echo $_GET['deleted_failure_message']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['deleted_successfully'])) { ?>
                <p class="text-center" style="color: green;"><?php echo $_GET['deleted_successfully']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['product_created'])) { ?>
                <p class="text-center" style="color: green;"><?php echo $_GET['product_created']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['product_failed'])) { ?>
                <p class="text-center" style="color:red;"><?php echo $_GET['product_failed']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['images_updated'])) { ?>
                <p class="text-center" style="color: green;"><?php echo $_GET['images_updated']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['images_failed'])) { ?>
                <p class="text-center" style="color:red;"><?php echo $_GET['images_failed']; ?></p>
            <?php } ?>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Product Id</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Product Offer</th>
                            <th scope="col">Product Category</th>
                            <th scope="col">Edit Images</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) { ?>
                            <tr>
                                <td></td>
                                <td><?php echo $product['product_id']; ?></td>
                                <td><img src="<?php echo "../assets/imgs/" . $product['product_image']; ?>" style="width: 70px;"></td>
                                <td><?php echo $product['product_name']; ?></td>
                                <td><?php echo $product['product_price']; ?> LKR</td>
                                <td><?php echo $product['product_special_offer'] . "%"; ?></td>
                                <td><?php echo $product['product_category']; ?></td>
                                <td>
                                    <a class="btn btn-warning" href="<?php echo "edit_images.php?product_id=" . $product['product_id'] . "&product_name=" . $product['product_name']; ?>">
                                        Edit Images
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="edit_product.php?product_id=<?php echo $product['product_id']; ?>">Edit</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="delete_product.php?product_id=<?php echo $product['product_id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Pagination controls -->
                <nav aria-label="Page navigation" class="mx-auto">
                    <ul class="pagination mt-5 mx-auto">
                        <li class="page-item <?php if ($page_no <= 1) { echo 'disabled'; } ?>">
                            <a class="page-link" href="<?php if ($page_no > 1) { echo "?page_no=" . ($page_no - 1); } else { echo '#'; } ?>">Previous</a>
                        </li>
              
                        <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
                        <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

                        <?php if ($page_no >= 3) { ?>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="?page_no=<?php echo $page_no; ?>"><?php echo $page_no; ?></a></li>
                        <?php } ?>

                        <li class="page-item <?php if ($page_no >= $total_no_of_pages) { echo 'disabled'; } ?>">
                            <a class="page-link" href="<?php if ($page_no < $total_no_of_pages) { echo "?page_no=" . ($page_no + 1); } else { echo '#'; } ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </main>
    </div>
</div>


<script src="../admin/assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script>
    feather.replace();
</script>

</body>
</html>
