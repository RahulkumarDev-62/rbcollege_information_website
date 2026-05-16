<?php
include('../includes/db.php');

// 1. Notice Save करने का Logic
if(isset($_POST['add_notice'])) {
    $notice_text = mysqli_real_escape_string($conn, $_POST['notice_text']);
    
    if(!empty($notice_text)) {
        $sql = "INSERT INTO notices (notice_text) VALUES ('$notice_text')";
        mysqli_query($conn, $sql);
        $msg = "Notice added successfully!";
    }
}

// 2. Notice Delete करने का Logic
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM notices WHERE id = $id");
    header("Location: manage-notices.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Notices | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .card { border: none; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .btn-primary { background-color: #6c5ce7; border: none; }
        .btn-primary:hover { background-color: #5b4bc4; }
        .notice-list-item { border-left: 5px solid #6c5ce7; margin-bottom: 10px; background: white; padding: 15px; border-radius: 5px; display: flex; justify-content: space-between; align-items: center; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="dashboard.php" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Back to Dashboard</a>
                <h2 class="fw-bold">Notice Board Manager</h2>
            </div>

            <?php if(isset($msg)) echo "<div class='alert alert-success'>$msg</div>"; ?>

            <div class="card p-4 mb-4">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Write New Notice</label>
                        <textarea name="notice_text" class="form-control" rows="3" placeholder="Type notice here (e.g. Admission Open for 2025...)" required></textarea>
                    </div>
                    <button type="submit" name="add_notice" class="btn btn-primary w-100">Post Notice</button>
                </form>
            </div>

            <h4 class="mb-3">Active Notices</h4>
            <div class="notice-container">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM notices ORDER BY id DESC");
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "
                        <div class='notice-list-item shadow-sm'>
                            <span>{$row['notice_text']}</span>
                            <a href='?delete={$row['id']}' class='btn btn-sm btn-outline-danger' onclick='return confirm(\"Are you sure?\")'>
                                <i class='bi bi-trash'></i> Delete
                            </a>
                        </div>";
                    }
                } else {
                    echo "<p class='text-muted text-center'>No notices found.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>