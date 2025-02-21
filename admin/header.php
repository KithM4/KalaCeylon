<?php 

session_start();
include('../server/connection.php');
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin Dashboard for Kala Ceylon">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">

    <title>ADMIN | KALA CEYLON</title>
    <link rel="icon" type="image/png" href="../assets/imgs/main/title.png">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    <link href="../admin/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Inline Styles -->
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <link href="admin/dashboard.css" rel="stylesheet">

  </head>

  <body>
    

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Kala Ceylon</a>

  <button class="navbar-toggler position-absolute d-md-none collapsed" 
          type="button" 
          data-bs-toggle="collapse" 
          data-bs-target="#sidebarMenu" 
          aria-controls="sidebarMenu" 
          aria-expanded="false" 
          aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!--  Sign Out Section -->
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php?logout=1">Sign out</a>
    </div>
  </div>
</header>
