<?php
include('header.php');

// Ensure admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php'); 
    exit(); 
}

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id']; // Get the user_id 


    $stmt = $conn->prepare("UPDATE users SET status = 'blocked' WHERE user_id = ?");
    $stmt->bind_param("i", $user_id); 


    if ($stmt->execute()) {

        header("location: customer.php?delete_success=User has been blocked");
        exit(); 
    } else {

        header("location: customer.php?delete_failed=Error blocking user");
        exit(); 
    }

    $stmt->close(); 
} else {

    header('location: customer.php');
    exit(); 
}
?>
