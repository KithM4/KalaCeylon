<?php


include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='antique' ORDER BY RAND() LIMIT 4");

$stmt->execute();

$antique = $stmt->get_result();

?>
