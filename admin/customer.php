<?php include('header.php'); ?>

<?php

if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php');
    exit();
}

$search = '';

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    
    // search users by username or email
    $stmt = $conn->prepare("SELECT user_id, user_name, user_email, status FROM users WHERE user_name LIKE ? OR user_email LIKE ?");
    $searchTerm = "%" . $search . "%"; 
    $stmt->bind_param("ss", $searchTerm, $searchTerm); 
} else {

    $stmt = $conn->prepare("SELECT user_id, user_name, user_email, status FROM users");
}

$stmt->execute();
$result = $stmt->get_result(); 
?>

<div class="container-fluid">
  <div class="row" style="min-height: 1000px;">
        <?php include('sidemenu.php'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h2 class="mt-3">Manage Customers</h2>

            <!-- Search form -->
            <form method="POST" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by username or email..." value="<?php echo htmlspecialchars($search); ?>">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>

            <!-- Users table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['user_email']); ?></td>
                            <td>
                                <?php if ($row['status'] == 'active') { ?>
                                    <span class="badge bg-success">Active</span>
                                <?php } else { ?>
                                    <span class="badge bg-danger">Blocked</span>
                                <?php } ?>
                            </td>
                            <td>
                                <!-- Edit and Block/Unblock actions -->
                                <a href="edit_user.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="block_user.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-danger btn-sm">
                                    <?php echo ($row['status'] == 'active') ? 'Block' : 'Unblock'; ?>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
</div>

<!--  JavaScript files -->
<script src="../admin/assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

<script>
    feather.replace(); 
</script>

</body>
</html>
