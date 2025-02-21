<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>KALA CEYLON | SRI LANKA </title>
  <link rel="icon" type="image/png" href="assets\imgs\main\title.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/style.css?v=1.1" />
</head>


<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
  <div class="container">
    
    <!-- Hamburger menu  -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Logo  -->
    <a href="index.php">
      <img class="logo" src="assets/imgs/main/logo.png" alt="Logo" />
    </a>

    <!-- navigation links -->
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.php">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="blog.php">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
      </ul>
    </div>

    <!-- Profile & Cart icons -->
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a href="cart.php">
          <i class="fa fa-shopping-cart" aria-hidden="true">
            <?php if (isset($_SESSION['quantity']) && $_SESSION['quantity'] != 0) { ?>
              <span class="cart-quantity"><?php echo $_SESSION['quantity']; ?></span>
            <?php } ?>
          </i>
        </a>
      </li>

      <li class="nav-item">
        <a href="account.php"><i class="fa fa-user" aria-hidden="true"></i></a>
      </li>
    </ul>
  </div>
</nav>
