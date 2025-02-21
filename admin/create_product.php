<?php

include('../server/connection.php');

if (isset($_POST['create_product'])) {

    // Retrieve product details from the form
    $product_name = $_POST['name'];
    $product_description = $_POST['description'];
    $product_price = $_POST['price'];
    $product_special_offer = $_POST['offer'];
    $product_category = $_POST['category'];

    // Handle the uploaded images
    $image1 = $_FILES['image1']['tmp_name'];
    $image2 = $_FILES['image2']['tmp_name'];
    $image3 = $_FILES['image3']['tmp_name'];
    $image4 = $_FILES['image4']['tmp_name'];

    // Create image filenames based on product name
    $image_name1 = $product_name . "1.jpeg";
    $image_name2 = $product_name . "2.jpeg";
    $image_name3 = $product_name . "3.jpeg";
    $image_name4 = $product_name . "4.jpeg";

    // Move uploaded images to the designated folder
    move_uploaded_file($image1, "../assets/imgs/" . $image_name1);
    move_uploaded_file($image2, "../assets/imgs/" . $image_name2);
    move_uploaded_file($image3, "../assets/imgs/" . $image_name3);
    move_uploaded_file($image4, "../assets/imgs/" . $image_name4);

    $stmt = $conn->prepare("INSERT INTO products (product_name, product_description, product_price, product_special_offer,
                                                    product_image, product_image2, product_image3, product_image4,
                                                    product_category) VALUES (?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param(
        'sssssssss',
        $product_name,
        $product_description,
        $product_price,
        $product_special_offer,
        $image_name1,
        $image_name2,
        $image_name3,
        $image_name4,
        $product_category
    );

    if ($stmt->execute()) {
        header('location: products.php?product_created=Product has been created successfully');
    } else {
        header('location: products.php?product_created=Error, Try Again');
    }
}

?>

<script src="../admin/assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="dashboard.js"></script>
