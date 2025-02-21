<?php

include('server/connection.php');

if (isset($_POST['order_details_btn']) && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id']; 
    $order_status = $_POST['order_status']; 

    // fetch order items from order ID
    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
    $stmt->bind_param('i', $order_id); 
    $stmt->execute();
    $order_details = $stmt->get_result(); 
 
    $order_total_price = calculateTotalOrderPrice($order_details);
} else {
    // no order ID -> redirect to the account page 
    header('location: account.php');
    exit;
}

//  total order price
function calculateTotalOrderPrice($order_details) {
    $total = 0;
    while ($row = $order_details->fetch_assoc()) {
        $total += $row['product_price'] * $row['product_quantity'];
    }
    return $total;
}
?>

<!-- Header -->
<?php include('layouts/header.php'); ?>

<!-- Order Details Section -->
<section id="orders" class="orders container my-5 py-3" style="min-height: 600px;">
    <div class="container mt-5">
        <h2 class="font-weight-bold text-center">Order Details</h2>
        <hr class="mx-auto" />
    </div>

    <table class="mt-5 pt-5 mx-auto">
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>

        <?php
       
        $stmt->execute();
        $order_details = $stmt->get_result();

        while ($row = $order_details->fetch_assoc()) { ?>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/<?php echo $row['product_image']; ?>" />
                        <div>
                            <p class="mt-3"> <?php echo $row['product_name']; ?> </p>
                        </div>
                    </div>
                </td>
                <td>
                    <span> <?php echo $row['product_price']; ?> LKR</span>
                </td>
                <td>
                    <span> <?php echo $row['product_quantity']; ?> </span>
                </td>
            </tr>
        <?php } ?>
    </table>

    <!--  not paid -> show btn -->
    <?php if ($order_status == "not paid") { ?>
        <form style="float: right;" method="POST" action="payment.php">
            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
            <input type="hidden" name="order_total_price" value="<?php echo $order_total_price; ?>" />
            <input type="hidden" name="order_status" value="<?php echo $order_status; ?>" />
            <input type="submit" name="order_pay_btn" class="btn btn-primary" value="Pay Now" />
        </form>
    <?php } ?>
</section>

<!-- Footer -->
<?php include('layouts/footer.php'); ?>
