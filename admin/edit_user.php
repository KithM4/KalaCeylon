<?php include('header.php'); ?>

<?php

if (!isset($_SESSION['admin_logged_in'])) {

    header('location: login.php');
    exit();
}

if (!isset($_GET['user_id'])) {

    header('location: customer.php');
    exit();
}

$user_id = $_GET['user_id'];

$stmt = $conn->prepare("SELECT user_name, user_email, status FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id); 
$stmt->execute();
$stmt->bind_result($user_name, $user_email, $status);
$stmt->fetch();
$stmt->close(); 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $new_username = $_POST['user_name'];
    $new_email = $_POST['user_email'];
    $new_status = $_POST['status'];


    $stmt = $conn->prepare("UPDATE users SET user_name = ?, user_email = ?, status = ? WHERE user_id = ?");
    $stmt->bind_param("sssi", $new_username, $new_email, $new_status, $user_id);


    if ($stmt->execute()) {
    
        header("location: customer.php?update_success=User updated successfully");
        exit();
    } else {
     
        echo "<p class='text-danger'>Error updating user.</p>";
    }
    $stmt->close(); 
}
?>


<div class="container">
    <h2>Edit User</h2>
    <form method="POST">
    
        <div class="mb-3">
            <label for="user_name" class="form-label">Username</label>
            <input type="text" name="user_name" class="form-control" 
                   value="<?php echo htmlspecialchars($user_name); ?>" 
                   required>
        </div>

    
        <div class="mb-3">
            <label for="user_email" class="form-label">Email</label>
            <input type="email" name="user_email" class="form-control" 
                   value="<?php echo htmlspecialchars($user_email); ?>" 
                   required>
        </div>

 
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="active" <?php echo ($status == 'active') ? 'selected' : ''; ?>>Active</option>
                <option value="blocked" <?php echo ($status == 'blocked') ? 'selected' : ''; ?>>Blocked</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Update User</button>
        <a href="customer.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
