<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='handmade' ORDER BY RAND() LIMIT 4");

$stmt->execute();

$handmade = $stmt->get_result();

?>
