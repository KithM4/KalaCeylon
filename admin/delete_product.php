<?php session_start(); 

include('../server/connection.php'); 

?>

<?php

if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php'); 
    exit(); 
}

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id']; // Get the product ID 

    $stmt = $conn->prepare("DELETE FROM products WHERE product_id=?");
    $stmt->bind_param('i', $product_id); 
    
    if ($stmt->execute()) {
   
        header('location: products.php?deleted_successfully=Product has been deleted Successfully');
    } else {
      
        header('location: products.php?deleted_failure=Could not delete product');
    }
}
?>
