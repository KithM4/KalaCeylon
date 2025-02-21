<?php

session_start();

include('connection.php');

if (!isset($_SESSION['user_id'])) {

    header('location: login.php');
    exit();
}

if (!isset($_GET['order_id'])) {

    header('location: ../index.php');
    exit();
}

// Retrieve order details 
$order_id = $_GET['order_id'];
$transaction_id = "FAKE" . rand(100000, 999999); // fake ID
$order_status = "paid"; 
$user_id = $_SESSION['user_id']; 

$stmt = $conn->prepare("UPDATE orders SET order_status = ? WHERE order_id = ?");
$stmt->bind_param('si', $order_status, $order_id);

if (!$stmt->execute()) {
    die("Error updating order: " . $stmt->error);
}

$stmt1 = $conn->prepare("INSERT INTO payments(order_id, user_id, transaction_id) VALUES (?, ?, ?)");
$stmt1->bind_param('iis', $order_id, $user_id, $transaction_id);

if (!$stmt1->execute()) {
    die("Error inserting payment: " . $stmt1->error);
}

header('location: ../account.php?payment_message=Paid Successfully, thanks for shopping with us');
exit();
?>
