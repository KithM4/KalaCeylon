<?php include('layouts/header.php'); ?>

<?php
session_start();
include('server/connection.php'); 

// already logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('location: account.php');
    exit();
}

//  if login form was submit
if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']); 

    //fetch user details
    $stmt = $conn->prepare("SELECT user_id, user_name FROM users WHERE user_email = ? AND user_password = ? AND status = 'active'");
    $stmt->bind_param('ss', $email, $password); 

    if ($stmt->execute()) {
        $stmt->bind_result($user_id, $user_name);
        $stmt->store_result(); 

        if ($stmt->num_rows() == 1) { 
            $stmt->fetch(); // Retrieve user data

           
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $email;
            $_SESSION['logged_in'] = true;

         
            header('location: account.php?login_success=Logged in Successfully');
            exit();
        } else {
           
            header('location: login.php?error=Invalid credentials or account is blocked');
            exit();
        }
    } else {
     
        header('location: login.php?error=Something went wrong');
        exit();
    }
}
?>

<!-- Login Form Section -->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Login</h2>
        <hr class="mx-auto" />
    </div>
    <div class="mx-auto container">

        <!-- Display error message if login fails -->
        <p style="color: red;" class="text-center">
            <?php if (isset($_GET['error'])) { echo $_GET['error']; } ?>
        </p>

        <!-- Login Form -->
        <form id="login-form" action="login.php" method="POST">
            <!-- Email Field -->
            <div class="form-group">
                <label for="login-email">Email</label>
                <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required />
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <label for="login-password">Password</label>
                <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required />
            </div>

            <!-- Show Password Checkbox -->
            <div class="form-group text-center">
                <div class="form-check d-inline-flex align-items-center justify-content-center">
                    <input type="checkbox" class="form-check-input" id="show-password" style="width: 16px; height: 16px; margin-right: 5px;">
                    <label class="form-check-label" for="show-password">Show Password</label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login" />
            </div>

            <!-- Register Redirect Link -->
            <div class="form-group">
                <a id="register-url" href="register.php" class="btn">Don't have an account? Register</a>
            </div>
        </form>
    </div>
</section>

<!-- JavaScript to Toggle Password Visibility -->
<script>
    document.getElementById('show-password').addEventListener('change', function() {
        let passwordField = document.getElementById('login-password');
        passwordField.type = this.checked ? 'text' : 'password';
    });
</script>

<!-- Include Footer -->
<?php include('layouts/footer.php'); ?>
