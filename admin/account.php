<?php

include('header.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit(); 
}
?>

<div class="container-fluid">
    <div class="row min-vh-100"> 

        <!--  sidebar menu -->
        <?php include('sidemenu.php'); ?> 

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Admin Account</h1>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-4"> 
                    
                           
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                               
                                    <li class="list-group-item">
                                        <span data-feather="hash"></span> 
                                        <strong>Id:</strong> <?php echo $_SESSION['admin_id']; ?>
                                    </li>
          
                                    <li class="list-group-item">
                                        <span data-feather="user"></span> 
                                        <strong>Name:</strong> <?php echo $_SESSION['admin_name']; ?>
                                    </li>
                             
                                    <li class="list-group-item">
                                        <span data-feather="mail"></span> 
                                        <strong>Email:</strong> <?php echo $_SESSION['admin_email']; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <div class="col-md-8">
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap JavaScript bundle -->
<script src="../admin/assets/dist/js/bootstrap.bundle.min.js"></script>

<!-- Feather Icons  -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons"></script>
<script>
    feather.replace();
</script> 
