<?php

session_start();

include('connection.php');

if (!isset($_SESSION['logged_in'])) {
    header('location: ../checkout.php?message=Please Login to place an order');
    exit();
}

if (isset($_POST['place_order'])) {

    // Get user info from form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $order_cost = $_SESSION['total']; 
    $order_status = "not paid"; // Set the order status to 'not paid'
    $user_id = $_SESSION['user_id']; 
    $order_date = date('Y-m-d H:i:s'); 

    $stmt = $conn->prepare("INSERT INTO orders(order_cost, order_status, user_id, user_phone, user_city, user_address, order_date) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('isiisss', $order_cost, $order_status, $user_id, $phone, $city, $address, $order_date);

    // insertion fails
    if (!$stmt->execute()) {
        header('location: ../index.php?error=Order Failed');
        exit();
    }

    $order_id = $stmt->insert_id;
    
    $_SESSION['order_id'] = $order_id;

    // Insert each product from the cart into the order_items table
    foreach ($_SESSION['cart'] as $key => $product) {
        $product_id = $product['product_id'];
        $product_name = $product['product_name'];
        $product_image = $product['product_image'];
        $product_price = $product['product_price'];
        $product_quantity = $product['product_quantity'];

        $stmt1 = $conn->prepare("INSERT INTO order_items (order_id, product_id, product_name, product_image, product_price, product_quantity, user_id, order_date) 
                                 VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt1->bind_param('iissiiis', $order_id, $product_id, $product_name, $product_image, $product_price, $product_quantity, $user_id, $order_date);
        $stmt1->execute();
    }

    unset($_SESSION['cart']);
    unset($_SESSION['total']);
    unset($_SESSION['quantity']);

    session_write_close();

    header('location: ../payment.php?order_status=Order placed successfully');
    exit();
}
?>
