<?php

include('server/connection.php');

if (isset($_GET['product_id'])) {

    $product_id = $_GET['product_id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();

    $products = $stmt->get_result();
} else {

    header('Location: index.php');
}
?>

<!-- Header -->
<?php include('layouts/header.php'); ?>

<!-- Single Product Section -->
<section class="container single-product my-5 pt-5">
    <div class="row mt-5">

        <?php while ($row = $products->fetch_assoc()) { ?>

            <!-- Product Image Section -->
            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="assets/imgs/<?php echo $row['product_image']; ?>" id="mainImg" />
                
                <!-- Thumbnail Images -->
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image']; ?>" width="100%" class="small-img" />
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image2']; ?>" width="100%" class="small-img" />
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image3']; ?>" width="100%" class="small-img" />
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image4']; ?>" width="100%" class="small-img" />
                    </div>
                </div>
            </div>

            <!-- Product Details Section -->
            <div class="col-lg-6 col-md-12 col-12">
                <h6>Arts</h6>
                <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                <h2><?php echo $row['product_price']; ?> LKR</h2>
            
                <form method="POST" action="cart.php">
              
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" />
                    <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>" />
                    <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>" />
                    <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>" />

               
                    <input type="number" name="product_quantity" value="1" />

                   
                    <button class="buy-btn" type="submit" name="add_to_cart">Add to Cart</button>
                </form>

                <h4 class="mt-5 mb-5">Product Details</h4>
                <span><?php echo $row['product_description']; ?></span>
            </div>

        <?php } ?>
    </div>
</section>

<!-- Related Products Section -->
<section id="related-product" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3>Related Products</h3>
        <hr class="mx-auto" />
        <p>Dive into Kala Ceylon’s handpicked selection of new arrivals.</p>
    </div>

    <div class="row mx-auto container-fluid">
     
        <?php include('server/get_featured_products.php'); ?>

        <?php while ($row = $featured_products->fetch_assoc()) { ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
                <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price"><?php echo $row['product_price']; ?> LKR</h4>
                
                <a href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>">
                    <button class="buy-btn">Buy Now</button>
                </a>
            </div>
        <?php } ?>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<!-- Script for Image Switching -->
<script>
  
    var mainImg = document.getElementById("mainImg");
    var smallImg = document.getElementsByClassName("small-img");

    for (let i = 0; i < 4; i++) {
        smallImg[i].onclick = function() {
            mainImg.src = smallImg[i].src;
        };
    }
</script>

<!-- Footer -->
<?php include('layouts/footer.php'); ?>
