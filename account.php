<!-- Header -->
<?php include('layouts/header.php'); ?>

<?php
// database connection
include('server/connection.php');

session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('location: login.php');
    exit;
}

//  logout request
if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        header('location:login.php');
        exit;
    }
}

// Handle password change request
if (isset($_POST['change_password'])) {
    $password = $_POST['password']; 
    $confirm_password = $_POST['confirm-password']; 
    $user_email = $_SESSION['user_email']; 

    if ($password !== $confirm_password) {
        header('location: account.php?error=Check Again Confirm Password');
    }
    
    else if (strlen($password) < 6) {
        header('location: account.php?error=Password must be at least 6 characters');
    }

    else {
        $stmt = $conn->prepare("UPDATE users SET user_password = ? WHERE user_email = ?");
        $stmt->bind_param('ss', md5($password), $user_email); 

        if ($stmt->execute()) {
            header('location:account.php?message=Password has been Updated Successfully');
        } else {
            header('location:account.php?error=Password update Failed');
        }
    }
}

// Get orders for the logged-in user
if (isset($_SESSION['logged_in'])) {
    $user_id = $_SESSION['user_id']; 

    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = ?");
    $stmt->bind_param('i', $user_id); 

    $stmt->execute();
    $orders = $stmt->get_result(); 
}
?>

<!-- Account Section -->
<section class="my-5 py-5">
    <div class="row container mx-auto">

        <!-- Display success or error messages -->
        <?php if (isset($_GET['payment_message'])) { ?>
            <p class="mt-5 text-center" style="color: green;"><?php echo $_GET['payment_message']; ?></p>
        <?php } ?>

        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
            <p class="text-center" style="color: green;"><?php if (isset($_GET['register_success'])) {
                echo $_GET['register_success'];
            } ?></p>
            <p class="text-center" style="color: green;"><?php if (isset($_GET['login_success'])) {
                echo $_GET['login_success'];
            } ?></p>
            <h3 class="font-weight-bold">Account Info</h3>
            <hr class="mx-auto" />
            <div class="account-info">
                <p>Name :<span> <?php if (isset($_SESSION['user_name'])) {
                                    echo $_SESSION['user_name'];
                                } ?> </span></p>
                <p>Email :<span> <?php if (isset($_SESSION['user_email'])) {
                                        echo $_SESSION['user_email'];
                                    } ?> </span></p>

                <p><a href="#orders" id="orders-btn">Your Orders</a></p>
                <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
            </div>
        </div>

        <!-- Change Password Form -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <form id="account-form" method="POST" action="account.php">
                <p class="text-center" style="color: red;"><?php if (isset($_GET['error'])) {
                                                                echo $_GET['error'];
                                                            } ?></p>
                <p class="text-center" style="color: green;"><?php if (isset($_GET['message'])) {
                                                                    echo $_GET['message'];
                                                                } ?></p>
                <h3>Change Password</h3>
                <hr class="mx-auto" />

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="account-password" name="password"
                        placeholder="Password" required />
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="account-password-confirm"
                        name="confirm-password" placeholder="Confirm Password" required />
                </div>

                <div class="form-group text-center">
                    <div class="form-check d-inline-flex align-items-center justify-content-center">
                        <input type="checkbox" class="form-check-input" id="show-password" style="width: 16px; height: 16px; margin-right: 5px;">
                        <label class="form-check-label" for="show-password">Show Password</label>
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" value="Change Password" class="btn" name="change_password" id="change-pass-btn" />
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Orders Section -->
<section id="orders" class="orders container my-5 py-3">
    <div class="container mt-2">
        <h2 class="font-weight-bold text-center">Your Orders</h2>
        <hr class="mx-auto" />
    </div>

    <table class="mt-5 pt-5">
        <tr>
            <th>Order ID</th>
            <th>Order Cost</th>
            <th>Order Status</th>
            <th>Order Date</th>
            <th>Order Details</th>
        </tr>

        <!-- Loop through orders and display them -->
        <?php while ($row = $orders->fetch_assoc()) { ?>
            <tr>
                <td><span> <?php echo $row['order_id']; ?> </span></td>
                <td><span> <?php echo $row['order_cost']; ?> </span></td>
                <td><span> <?php echo $row['order_status']; ?> </span></td>
                <td><span> <?php echo $row['order_date']; ?> </span></td>

                <!-- Order Details Button -->
                <td>
                    <form method="POST" action="order_details.php">
                        <input type="hidden" value="<?php echo $row['order_status']; ?>" name="order_status" />
                        <input type="hidden" value="<?php echo $row['order_id']; ?>" name="order_id" />
                        <input class="btn order-details-btn" name="order_details_btn" type="submit" value="details">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>


<script>
    // Toggle password visibility
    document.getElementById('show-password').addEventListener('change', function() {
        let passwordFields = document.querySelectorAll('#account-password, #account-password-confirm');
        passwordFields.forEach(field => {
            field.type = this.checked ? 'text' : 'password'; 
        });
    });
</script>

<!-- Footer -->
<?php include('layouts/footer.php'); ?>
