<?php include('layouts/header.php'); ?> <!-- Include the header file -->

<!-- Home Section -->
<section id="home">
  <div class="container">
    <h5>NEW ARRIVALS</h5>
    <h1><span>History in Your Hands, </span> Antiques to Art</h1>
    <p>Kala Ceylon offers a curated collection of exquisite art at the most competitive prices.</p>
  </div>
</section>

<!-- Brand Logos Section -->
<section id="brand" class="container">
  <div class="row">

    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand/brand1.png" />
    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand/brand2.png" />
    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand/brand3.png" />
    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand/brand4.png" />
  </div>
</section>

<!-- Banners Section -->
<section id="new" class="w-100">
  <div class="row p-0 m-0">

    <div class="one col-lg-3 col-md-6 col-sm-12 p-0">
      <img class="img-fluid" src="assets/imgs/main/mainimg3.jpg" />
      <div class="details"><h2>Arts</h2></div>
    </div>
    <div class="one col-lg-3 col-md-6 col-sm-12 p-0">
      <img class="img-fluid" src="assets/imgs/main/mainimg2.jpg" />
      <div class="details"><h2>Handmades</h2></div>
    </div>
    <div class="one col-lg-3 col-md-6 col-sm-12 p-0">
      <img class="img-fluid" src="assets/imgs/main/mainimg1.jpg" />
      <div class="details"><h2>Antiques</h2></div>
    </div>
    <div class="one col-lg-3 col-md-6 col-sm-12 p-0">
      <img class="img-fluid" src="assets/imgs/main/mainimg4.jpg" />
      <div class="details"><h2>Rare Currency</h2></div>
    </div>
  </div>
</section>

<!-- Featured Products Section -->
<section id="featured" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
    <h3>Our Showcase</h3>
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

<!-- Promotional Banner -->
<section id="banner" class="my-5 py-5">
  <div class="container">
    <h4>Discover Deals Now</h4>
    <h1>Seasonal Splendor Sale <br />UP to 30% OFF</h1>
    <a href="shop.php"><button class="text-uppercase">Shop Now</button></a>
  </div>
</section>

<!-- Arts Category Section -->
<section id="arts" class="my-5">
  <div class="container text-center mt-5 py-5">
    <h3>Paintings</h3>
    <hr class="mx-auto" />
    <p>Discover breathtaking paintings and sculptures crafted by talented artists.</p>
  </div>

  <div class="row mx-auto container-fluid">
    <?php include('server/get_arts.php'); ?> 

    <?php while ($row = $arts_products->fetch_assoc()) { ?>
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

<!-- Handmade Category Section -->
<section id="watches" class="my-5">
  <div class="container text-center mt-5 py-5">
    <h3>Handmade</h3>
    <hr class="mx-auto" />
    <p>Explore unique, handcrafted items that blend tradition with creativity.</p>
  </div>

  <div class="row mx-auto container-fluid">
    <?php include('server/get_handmade.php'); ?> 

    <?php while ($row = $handmade->fetch_assoc()) { ?>
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

<!-- Antique Category Section -->
<section id="shoes" class="my-5">
  <div class="container text-center mt-5 py-5">
    <h3>Antique</h3>
    <hr class="mx-auto" />
    <p>Unearth timeless treasures and rare collectibles with rich histories.</p>
  </div>

  <div class="row mx-auto container-fluid">
    <?php include('server/get_antique.php'); ?> 

    <?php while ($row = $antique->fetch_assoc()) { ?>
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

<?php include('layouts/footer.php'); ?> 
