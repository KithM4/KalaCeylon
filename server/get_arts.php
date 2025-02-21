<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='arts' ORDER BY RAND() LIMIT 4");

$stmt->execute();

$arts_products = $stmt->get_result();

?>
