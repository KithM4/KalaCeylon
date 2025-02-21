<?php

include('header.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}
?>

<div class="container-fluid">
    <div class="row" style="min-height: 1000px;">

        <!--  Sidebar Section -->
        <?php include('sidemenu.php'); ?>

        <!-- Main Admin Account  -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Admin Account</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2"></div>
                </div>
            </div>

            <div class="container">
                <p>📧 Please contact: <strong>admin@email.com</strong></p>
                <p>📞 Call: <strong>011 7894 197</strong></p>
            </div>

        </main>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ZMP7rVo3mIykV+2+9J3U4cL5iD0dmzLp60pb6Dg9y5I5jz5W/0z1y9U8cKld+l5o" 
        crossorigin="anonymous"></script>
<script src="../admin/assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script>feather.replace();</script>
