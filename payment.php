<!-- Header -->
<?php include('layouts/header.php'); ?>

<?php
session_start();

include('server/connection.php');

if (!isset($conn)) {
    die("Database connection failed. Please check connection.php");
}

if (!isset($_SESSION['order_id'])) {
    die("<h2 class='text-center'>No order found. Please place an order first.</h2>");
}

$order_id = $_SESSION['order_id'];

// fetch order details 
$stmt = $conn->prepare("SELECT order_cost, order_status FROM orders WHERE order_id = ?");
$stmt->bind_param('i', $order_id);
$stmt->execute();
$stmt->bind_result($order_total_price, $order_status);
$stmt->fetch();
$stmt->close();

//  no order found
if (!$order_total_price) {
    die("<h2 class='text-center'>No order found. Please check your orders.</h2>");
}
?>

<!-- Payment Section -->
<section class="my-5 py-5" style="min-height: 600px;">
    <div class="container text-center mt-3 pt-5">
        <h2 class="font-weight-bold">Payment</h2>
        <hr class="mx-auto" />
    </div>

    <div class="mx-auto container text-center">

        <p>Total Payment: <strong>LKR <?php echo number_format($order_total_price, 2); ?></strong></p>

        <?php if ($order_status == "not paid") { ?>
            <div class="d-flex justify-content-center flex-column align-items-center">
                <!-- PayPal Payment Button -->
                <div id="paypal-button-container" class="mb-3"></div>

                <!-- Instant Pay Button -->
                <a href="../server/instant_payment.php?order_id=<?php echo $order_id; ?>" 
                   class="btn buy-btn" style="color: white; background-color:coral;">
                    Instant Pay
                </a>
            </div>

        <?php } else { ?>
            <!-- confirmation message -->
            <p class="text-success">Your order has already been paid.</p>
        <?php } ?>
    </div>
</section>

<!-- PayPal SDK  -->
<script src="https://www.paypal.com/sdk/js?client-id=AZ3AZnmX3EIonRk3xmLf8V3j_tE4b11TaawE_dQdzd9j9RGwZS-Tl8qQ-WT4VjFyWAK9lNKncTxJNz9a&currency=USD"></script>

<script>
    // Initialize PayPal Button
    paypal.Buttons({
        
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: { value: '<?php echo $order_total_price; ?>' } 
                }]
            });
        },

        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                var transaction = orderData.purchase_units[0].payments.captures[0];
                
                window.location.href = "../server/complete_payment.php?transaction_id=" + transaction.id + "&order_id=<?php echo $order_id; ?>";
            });
        }
    }).render('#paypal-button-container');
</script>

<!-- Footer -->
<?php include('layouts/footer.php'); ?>
