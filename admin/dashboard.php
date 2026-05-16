<?php
session_start();
include('../includes/db.php');

// सुरक्षा: यदि लॉगिन नहीं है तो बाहर भेजें
if(!isset($_SESSION['admin_email'])) {
    header("Location: index.php");
    exit();
}

// 1. DELETE LOGIC (Duplicate post बचाव के साथ)
if(isset($_GET['delete_id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['delete_id']);
    $get_file = mysqli_query($conn, "SELECT file_name FROM uploads WHERE id = '$id'");
    $file_data = mysqli_fetch_assoc($get_file);
    if($file_data) {
        if(file_exists($file_data['file_name'])) { unlink($file_data['file_name']); }
        mysqli_query($conn, "DELETE FROM uploads WHERE id = '$id'");
        header("Location: dashboard.php?msg=Deleted");
        exit();
    }
}

// 2. FILE UPLOAD LOGIC
if(isset($_POST['upload'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $type = $_POST['type'];
    $file_name = $_FILES['file']['name'];
    $target_dir = "../uploads/" . $type . "s/"; 
    $new_file_name = time() . "_" . basename($file_name);
    $target_file = $target_dir . $new_file_name;

    if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
        mysqli_query($conn, "INSERT INTO uploads (title, file_name, category, file_type) VALUES ('$title', '$target_file', '$category', '$type')");
        header("Location: dashboard.php?msg=Success");
        exit(); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WPFixHub | Admin Responsive Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root { --primary: #6c5ce7; }
        body { background: #f8f9fa; font-family: 'Poppins', sans-serif; }
        .navbar { background: white; border-bottom: 3px solid var(--primary); }
        .admin-img { width: 40px; height: 40px; border-radius: 50%; border: 2px solid var(--primary); object-fit: cover; }
        .card { border-radius: 15px; border: none; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .btn-primary { background: var(--primary); border: none; }
        .notice-btn { background: #ff9f43; color: white; border: none; font-weight: 600; }
        .notice-btn:hover { background: #e68a2e; color: white; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg mb-4 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="dashboard.php">
 Admin Rahul Kumar 
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="adminNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item mb-2 mb-lg-0 me-lg-3">
                    <a href="manage-notices.php" class="btn notice-btn btn-sm rounded-pill px-4">
                        <i class="bi bi-megaphone-fill me-1"></i> Manage Notices
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center mb-2 mb-lg-0">
                    <img src="../assets/images/rahul.jpg" class="admin-img me-2">
                    <span class="fw-bold me-3">Rahul Kumar</span>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="btn btn-outline-danger btn-sm rounded-pill px-3">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card p-4">
                <h5 class="fw-bold text-primary mb-4"><i class="bi bi-plus-circle-fill"></i> New Upload</h5>
                <form action="dashboard.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Material Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter name..." required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Category</label>
                        <select name="category" class="form-select">
                            <option>General</option>
                            <option>Science</option>
                            <option>Arts</option>
                            <option>Commerce</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Type</label>
                        <select name="type" class="form-select">
                            <option value="pdf">PDF File</option>
                            <option value="photo">Photo / Gallery</option>
                            <option value="book">E-Book</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold">File Source</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                    <button type="submit" name="upload" class="btn btn-primary w-100 fw-bold py-2">Upload Resource</button>
                </form>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold m-0 text-dark">Managed Resources</h5>
                    <span class="badge bg-primary rounded-pill">Total Items: <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT id FROM uploads")); ?></span>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light text-uppercase" style="font-size: 0.75rem; letter-spacing: 1px;">
                            <tr>
                                <th>Name & Info</th>
                                <th class="d-none d-md-table-cell">Type</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $files = mysqli_query($conn, "SELECT * FROM uploads ORDER BY id DESC");
                            while($f = mysqli_fetch_assoc($files)) { ?>
                                <tr>
                                    <td>
                                        <div class="fw-bold text-dark" style="font-size: 0.9rem;"><?php echo $f['title']; ?></div>
                                        <small class="text-muted"><?php echo $f['category']; ?></small>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <span class="badge bg-light text-primary border"><?php echo strtoupper($f['file_type']); ?></span>
                                    </td>
                                    <td class="text-end">
                                        <a href="dashboard.php?delete_id=<?php echo $f['id']; ?>" 
                                           class="btn btn-outline-danger btn-sm border-0" 
                                           onclick="return confirm('Delete this file permanently?');">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>