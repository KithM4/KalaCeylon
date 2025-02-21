<?php include('layouts/header.php'); ?>

<?php
session_start();


if (isset($_POST['add_to_cart'])) {

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Get all product IDs currently in the cart
    $product_array_ids = array_column($_SESSION['cart'], "product_id");

    // Check if the product is already in the cart
    if (!in_array($_POST['product_id'], $product_array_ids)) {
       
        $product_id = $_POST['product_id'];
        $product_array = array(
            'product_id' => $_POST['product_id'],
            'product_name' => $_POST['product_name'],
            'product_price' => $_POST['product_price'],
            'product_image' => $_POST['product_image'],
            'product_quantity' => $_POST['product_quantity']
        );

        // Add the new product to the cart
        $_SESSION['cart'][$product_id] = $product_array;
    } else {
        
        echo '<script>alert("Product already added");</script>';
    }
    // calculate total again
    calculateTotalCart();
} 

//  remove product'
else if (isset($_POST['remove_product'])) {
    $product_id = $_POST['product_id'];

    unset($_SESSION['cart'][$product_id]);

    calculateTotalCart();
} 

//  edit quantity 
else if (isset($_POST['edit_quantity'])) {
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['product_quantity'] = $product_quantity;
    }

    calculateTotalCart();
}

// calculate total price and qty
function calculateTotalCart()
{
    $total_price = 0;
    $total_quantity = 0;

    // Check if the cart exists and has items
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
     
        foreach ($_SESSION['cart'] as $key => $value) {
            $price = $value['product_price'];
            $quantity = $value['product_quantity'];

            $total_price += ($price * $quantity);
            $total_quantity += $quantity;
        }
    }

    $_SESSION['total'] = $total_price;
    $_SESSION['quantity'] = $total_quantity;
}
?>

<!-- Cart Section -->
<section class="cart container d-flex flex-column align-items-center justify-content-center my-5 py-5" style="min-height: 80vh;">
    <div class="container mt-5 text-center">
        <h2 class="font-weight-bold">Your Cart</h2>
        <hr class="mx-auto" />
    </div>

    <table class="table mt-5 text-center">
        <thead>
            <tr>
                <th class="text-start">Product</th>
                <th class="text-center">Quantity</th>
                <th class="text-end">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <!-- Check if there are items in the cart -->
            <?php if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
           
                <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                    <tr>
                        <td class="text-start">
                            <div class="d-flex align-items-center">
                                <img src="assets/imgs/<?php echo $value['product_image']; ?>" width="50px" class="me-3" />
                                <div>
                                    <p class="m-0"><?php echo $value['product_name']; ?></p>
                                    <small>LKR <?php echo $value['product_price']; ?></small>
                                    
                                    <!-- remove product from cart -->
                                    <form method="POST" class="mt-2">
                                        <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                                        <button type="submit" name="remove_product" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                           
                            <form method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                                <input type="number" name="product_quantity" class="form-control d-inline-block w-25" value="<?php echo $value['product_quantity']; ?>" min="1" />
                                <button type="submit" name="edit_quantity" class="btn btn-warning btn-sm">Edit</button>
                            </form>
                        </td>
                        <td class="text-end">LKR <?php echo $value['product_quantity'] * $value['product_price']; ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
              
                <tr>
                    <td colspan="3" class="text-center">Your cart is empty.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


    <div class="cart-total text-center">
        <h4>Total: LKR <?php echo $_SESSION['total'] ?? 0; ?></h4>
    </div>

    <!-- Checkout button -->
    <div class="checkout-container mt-3">
        <form method="POST" action="checkout.php">
            <button type="submit" class="btn buy-btn" style="background-color: coral; color:aliceblue">Checkout</button>
        </form>
    </div>
</section>

<!-- Footer -->
<?php include('layouts/footer.php'); ?>
