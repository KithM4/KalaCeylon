<?php 

session_start();

include('connection.php');

if(isset($_GET['transaction_id']) && isset($_GET['order_id'])) {

    if (!isset($_SESSION['user_id'])) {

        header('location: login.php');
        exit();
    }

    $order_id = $_GET['order_id'];
    $transaction_id = $_GET['transaction_id'];
    $order_status = "paid"; 
    $user_id = $_SESSION['user_id']; 

    $stmt = $conn->prepare("UPDATE orders SET order_status = ? WHERE order_id = ?");

    $stmt->bind_param('si', $order_status, $order_id);
    
    // Execute the update query
    if ($stmt->execute()) {
        echo "Order updated successfully.";
    } else {
        echo "Error updating order: " . $stmt->error;
    }

    $stmt1 = $conn->prepare("INSERT INTO payments(order_id, user_id, transaction_id) VALUES (?,?,?)");

    $stmt1->bind_param('iis', $order_id, $user_id, $transaction_id);

    if ($stmt1->execute()) {
        echo "Payment inserted successfully.";
    } else {
        echo "Error inserting payment: " . $stmt1->error;
    }

    header('location: ../account.php?payment_message=Paid Successfully, thanks for your shopping with us');
    exit();
} else {
 
    header('location: ../index.php');
    exit();
}
?>
