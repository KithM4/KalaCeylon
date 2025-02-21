<?php include('header.php'); ?>

<?php

if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php');
    exit();
}

// Total Orders Count
$stmt1 = $conn->prepare("SELECT COUNT(*) FROM orders");
$stmt1->execute();
$stmt1->bind_result($total_orders);
$stmt1->fetch();
$stmt1->close();

// Total Revenue from Order Items
$stmt2 = $conn->prepare("SELECT SUM(product_price) FROM order_items");
$stmt2->execute();
$stmt2->bind_result($total_revenue);
$stmt2->fetch();
$stmt2->close();

// Total Users
$stmt3 = $conn->prepare("SELECT COUNT(*) FROM users");
$stmt3->execute();
$stmt3->bind_result($total_users);
$stmt3->fetch();
$stmt3->close();

// Total Products
$stmt4 = $conn->prepare("SELECT COUNT(*) FROM products");
$stmt4->execute();
$stmt4->bind_result($total_products);
$stmt4->fetch();
$stmt4->close();

// Order Status Counts


$order_statuses = ['Not Paid', 'Paid', 'Shipped', 'Delivered'];
$order_counts = [];

foreach ($order_statuses as $status) {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM orders WHERE order_status = ?");
    $stmt->bind_param("s", $status);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $order_counts[$status] = $count;
    $stmt->close();
}


$stmt5 = $conn->prepare("SELECT order_id, user_id, user_phone, user_address, order_status FROM orders ORDER BY order_date DESC LIMIT 5");
$stmt5->execute();
$delivery_details = $stmt5->get_result();
$stmt5->close();
?>


<div class="container-fluid">
  <div class="row" style="min-height: 1000px;">
        <!--  Sidebar Menu -->
        <?php include('sidemenu.php'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h2 class="mt-3">Admin Dashboard</h2>

            <!-- Stats Cards  -->
            <div class="row mt-4">
                <?php
                // Stats for Orders, Revenue, Users, Products
                $cards = [
                    ['Total Orders', $total_orders, 'primary'],
                    ['Total Revenue', number_format($total_revenue, 2) . ' LKR', 'success'],
                    ['Total Users', $total_users, 'warning'],
                    ['Total Products', $total_products, 'danger']
                ];

    
                foreach ($cards as $card) {
                    echo "<div class='col-md-3'>
                        <div class='card text-white bg-{$card[2]} mb-3'>
                            <div class='card-header'>{$card[0]}</div>
                            <div class='card-body'>
                                <h5 class='card-title'>{$card[1]}</h5>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>

            <!--Order Status Section -->
            <h2 class="mt-3">Order Status</h2>
            <div class="row mt-4">
                <?php
                // Status Cards for 'Not Paid', 'Paid', 'Shipped', 'Delivered'
                $statuses = ['Not Paid' => 'secondary', 'Paid' => 'info', 'Shipped' => 'dark', 'Delivered' => 'success'];

                foreach ($statuses as $status => $color) {
                    echo "<div class='col-md-3'>
                        <div class='card text-white bg-{$color} mb-3'>
                            <div class='card-header'>{$status} Orders</div>
                            <div class='card-body'>
                                <h5 class='card-title'>{$order_counts[$status]}</h5>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
         
        </main>
    </div>
</div>


<script src="../admin/assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="dashboard.js"></script>

<script>
    feather.replace();
</script>

</body>
</html>
