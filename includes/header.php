<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WP-FixHub | Digital Library & Notices</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .navbar-brand img {
            max-height: 50px;
            transition: transform 0.3s;
        }
        .navbar-brand img:hover {
            transform: scale(1.05);
        }
        .nav-link {
            font-weight: 500;
            color: #444 !important;
            margin-right: 15px;
        }
        .nav-link:hover {
            color: #6c5ce7 !important;
        }
        .navbar {
            background: #ffffff;
            border-bottom: 2px solid #f1f1f1;
            padding: 10px 0;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="assets/images/logo.png" alt="WP-FixHub Logo"> 
            <span class="ms-2 fw-bold text-dark"></span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                                <li class="nav-item">
                    <a class="nav-link" href="about.php">Rahul Kumar</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="category.php?type=pdf">PDFs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.php?type=book">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.php?type=photo">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="coverpage.html">Assignment Cover Page</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-outline-primary btn-sm rounded-pill px-3" href="admin/index.php">
                        <i class="bi bi-person-lock"></i> Admin Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>