<?php include('header.php'); ?> 

<?php


if (isset($_GET['product_id'])) {

    $product_id = $_GET['product_id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id=?");
    $stmt->bind_param('i', $product_id); // 'i' = integer type
    $stmt->execute();

    $products = $stmt->get_result();
    
} 

else if (isset($_POST['edit_btn'])) {

    // Retrieve form data
    $product_id = $_POST['product_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $offer = $_POST['offer'];
    $category = $_POST['category'];

    // update product details
    $stmt = $conn->prepare("UPDATE products 
                            SET product_name = ?, 
                                product_description = ?, 
                                product_price = ?, 
                                product_special_offer = ?, 
                                product_category = ? 
                            WHERE product_id = ?");
    

    $stmt->bind_param('sssssi', $title, $description, $price, $offer, $category, $product_id);


    if ($stmt->execute()) {
        header('location: products.php?edit_success_message=Product has been updated Successfully');
    } else {
        header('location: products.php?edit_failure_message=Error occurred, try again');
    }
} 

else {
    header('location: products.php');
}

?>


<div class="container-fluid">
    <div class="row" style="min-height: 1000px;">

         <!-- Sidebar Navigation -->
        <?php include('sidemenu.php'); ?> 

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
         
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>

            <!-- Edit Product Form -->
            <h2>Edit Product</h2>
            <div class="table-responsive">
                <div class="mx-auto container">
                    <form id="edit-form" action="edit_product.php" method="POST">
                        
        
                        <p style="color:red;">
                            <?php if (isset($_GET['error'])) { echo $_GET['error']; } ?>
                        </p>

                        <?php foreach ($products as $product) { ?>
     
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">

    
                            <div class="form-group mt-2">
                                <label>Title</label>
                                <input type="text" class="form-control" 
                                    id="product-name" 
                                    value="<?php echo $product['product_name']; ?>" 
                                    name="title" 
                                    placeholder="Title" 
                                    required>
                            </div>

                    
                            <div class="form-group mt-2">
                                <label>Description</label>
                                <input type="text" class="form-control" 
                                    id="product-desc" 
                                    value="<?php echo $product['product_description']; ?>" 
                                    name="description" 
                                    placeholder="Description" 
                                    required>
                            </div>

                         
                            <div class="form-group mt-2">
                                <label>Price</label>
                                <input type="text" class="form-control" 
                                    id="product-price" 
                                    value="<?php echo $product['product_price']; ?>" 
                                    name="price" 
                                    placeholder="Price" 
                                    required>
                            </div>

                  
                            <div class="form-group mt-2">
                                <label>Category</label>
                                <select class="form-select" required name="category">
                                    <option value="arts" <?php if ($product['product_category'] == 'arts') echo 'selected'; ?>>Painting</option>
                                    <option value="handmade" <?php if ($product['product_category'] == 'handmade') echo 'selected'; ?>>Handmade</option>
                                    <option value="antique" <?php if ($product['product_category'] == 'antique') echo 'selected'; ?>>Antique</option>
                                    <option value="currency" <?php if ($product['product_category'] == 'currency') echo 'selected'; ?>>Old Currency</option>
                                </select>
                            </div>

            
                            <div class="form-group mt-2">
                                <label>Special Offer (%)</label>
                                <input type="number" class="form-control" 
                                    id="product-offer"
                                    value="<?php echo isset($product['product_offer']) ? htmlspecialchars($product['product_offer']) : ''; ?>"
                                    name="offer" 
                                    placeholder="Offer %" 
                                    min="0" 
                                    max="100">
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group mt-3">
                                <input type="submit" class="btn btn-primary" name="edit_btn" value="Edit">
                            </div>

                        <?php } ?> 

                    </form>
                </div>
            </div>

        </main>
    </div>
</div>
