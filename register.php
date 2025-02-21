<?php

include('server/connection.php');

if (isset($_SESSION['logged_in'])) {
    header('location: account.php');
    exit;
}

// Check if the register form is submitted
if (isset($_POST['register'])) {
    // Retrieve form input values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    if ($password !== $confirmPassword) {
        header('location: register.php?error=Check Again Confirm Password');
    } 

    else if (strlen($password) < 6) { 
        header('location: register.php?error=Password must be at least 6 characters');
    } 
    else {
        
        $stmt1 = $conn->prepare("SELECT COUNT(*) FROM users WHERE user_email=?");
        $stmt1->bind_param('s', $email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();

        if ($num_rows != 0) { 
            header('location: register.php?error=User with this email already Exists');
        } 
        else {
            // Insert new user into the database
            $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)");
            
            $hashedPassword = md5($password);
            $stmt->bind_param('sss', $name, $email, $hashedPassword);

            // If user registration is successful
            if ($stmt->execute()) { 
        
                $user_id = $stmt->insert_id;

                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $name;
                $_SESSION['logged_in'] = true;

                header('location: account.php?register_success=Registration successful');
            } 
            else {
                header('location: register.php?error=Registration Failed');
            }
        }
    }
}
?>

<!-- Header -->
<?php include('layouts/header.php'); ?>

<!-- Register Section -->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Register</h2>
        <hr class="mx-auto" />
    </div>

    <div class="mx-auto container">

        <form id="register-form" method="POST" action="register.php">

            <p style="color: red;">
                <?php if (isset($_GET['error'])) { echo $_GET['error']; } ?>
            </p>

            <div class="form-group">
                <label for="register-name">Name</label>
                <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required />
            </div>

            <div class="form-group">
                <label for="register-email">Email</label>
                <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required />
            </div>

            <div class="form-group">
                <label for="register-password">Password</label>
                <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required />
            </div>

            <div class="form-group">
                <label for="register-confirm-password">Confirm Password</label>
                <input type="password" class="form-control" id="register-confirm-password" name="confirm-password" placeholder="Confirm Password" required />
            </div>

            <div class="form-group text-center">
                <div class="form-check d-inline-flex align-items-center justify-content-center">
                    <input type="checkbox" class="form-check-input" id="show-password" style="width: 16px; height: 16px; margin-right: 5px;">
                    <label class="form-check-label" for="show-password">Show Password</label>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn" id="register-btn" name="register" value="Register" />
            </div>

            <div class="form-group">
                <a id="login-url" href="login.php" class="btn">Do you have an account? Login</a>
            </div>
        </form>
    </div>
</section>

<!-- Show Password  -->
<script>
    document.getElementById('show-password').addEventListener('change', function() {
        let passwordFields = document.querySelectorAll('#register-password, #register-confirm-password');
        passwordFields.forEach(field => {
            field.type = this.checked ? 'text' : 'password';
        });
    });
</script>

<!-- Footer -->
<?php include('layouts/footer.php'); ?>
