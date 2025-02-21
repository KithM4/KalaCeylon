<?php

session_start();

include('../server/connection.php');

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {

    header('location: index.php');
    exit();
}

if (isset($_POST['login_btn'])) {
    // Get the form data
    $email = $_POST['email'];
    $password = md5($_POST['password']); 
    $remember = isset($_POST['remember']); 

    $stmt = $conn->prepare("SELECT admin_id, admin_name, admin_email, admin_password FROM admins WHERE admin_email=? AND admin_password=? LIMIT 1");
    $stmt->bind_param('ss', $email, $password); // Bind email and password parameters

    if ($stmt->execute()) {

        $stmt->bind_result($admin_id, $admin_name, $admin_email, $admin_password);
        $stmt->store_result();

        if ($stmt->num_rows() == 1) {
            $stmt->fetch();

            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_name'] = $admin_name;
            $_SESSION['admin_email'] = $admin_email;
            $_SESSION['admin_logged_in'] = true;

            // Handle "Remember Me" functionality
            if ($remember) {
                setcookie('admin_email', $email, time() + (86400 * 30), "/"); // Store email in a cookie for 30 days
            } else {
                setcookie('admin_email', '', time() - 3600, "/"); // Clear the cookie if "Remember Me" is not checked
            }

      
            header('location: index.php?login_success=Logged in Successfully');
            exit();
        } else {

            header('location: login.php?error=Could not Verify Your Account');
        }
    } else {
  
        header('location: login.php?error=Something went wrong');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | KALA CEYLON</title>
    <link rel="icon" type="image/png" href="../assets/imgs/main/title.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Page styling */
        body {
            background-color: #121212;
            color: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        /* Login container styles */
        .login-container {
            max-width: 350px;
            width: 100%;
            padding: 20px;
            background: #1e1e1e;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        /* Logo styling */
        .logo {
            width: 80px;
            margin-bottom: 15px;
        }

        /* Input field styling */
        .form-control {
            background: #333;
            border: 1px solid #444;
            color: #fff;
        }
        .form-control::placeholder {
            color: #bbb;
        }

        /* Button styling */
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Checkbox styling */
        .form-check {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Admin logo -->
        <img src="../assets/imgs/main/logof.jpg" alt="Admin Logo" class="logo">
        <h4 class="mb-3">Admin Login</h4>
        

        <div class="mx-auto container">
            <p style="color: red;" class="text-center">
                <?php if (isset($_GET['error'])) { echo $_GET['error']; } ?>
            </p>

            <!-- Login form -->
            <form id="login-form" action="login.php" method="POST">
                <div class="form-group mb-3">
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="Email"
                        value="<?php echo isset($_COOKIE['admin_email']) ? $_COOKIE['admin_email'] : ''; ?>" required />
                </div>
                <div class="form-group mb-3 mt-3">
                    <input type="password" class="form-control" id="login-password" name="password"
                        placeholder="Password" required />
                </div>
                <div class="form-group mb-3 mt-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember-me" name="remember"
                        <?php echo isset($_COOKIE['admin_email']) ? 'checked' : ''; ?> />
                    <label class="form-check-label" for="remember-me">Remember Me</label>
                </div>
                <div class="form-group mb-3 mt-3">
                    <input type="submit" class="btn btn-primary w-100" id="login-btn" name="login_btn" value="Login" />
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
