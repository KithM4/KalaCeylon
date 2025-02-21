<?php

include('../server/connection.php');

if (isset($_GET['user_id'])) {

    $user_id = $_GET['user_id'];

    // Get the current user status from the database
    $stmt = $conn->prepare("SELECT status FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id); 
    $stmt->execute(); 
    $stmt->bind_result($status); 
    $stmt->fetch(); 
    $stmt->close(); 

    // Toggle the user status 
    $new_status = ($status == 'active') ? 'blocked' : 'active';

    // Update the user status in the database
    $stmt = $conn->prepare("UPDATE users SET status = ? WHERE user_id = ?");
    $stmt->bind_param("si", $new_status, $user_id);
    $stmt->execute(); 
    $stmt->close(); 

    header("Location: customer.php");
    exit(); 
}
?>
