<?php
session_start();
include('../includes/db.php');

// यदि पहले से लॉगिन है, तो सीधे Dashboard पर भेजें
if(isset($_SESSION['admin_email'])) {
    header("Location: dashboard.php");
}

$error = "";

if(isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; // सुरक्षा के लिए आप Password Hash का उपयोग कर सकते हैं

    // आपकी फिक्स ईमेल आईडी: rahul@wp-fixhub.com
    // यहाँ आप डेटाबेस से चेक कर सकते हैं या फिलहाल मैन्युअल फिक्स कर सकते हैं
    if($email == "rahul@wp-fixhub.com" && $password == "admin123") {
        $_SESSION['admin_email'] = $email;
        header("Location: dashboard.php");
    } else {
        $error = "Invalid Email or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | WP-FixHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }
        .login-card {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }
        .login-card img {
            max-height: 60px;
            margin-bottom: 20px;
        }
        .btn-login {
            background: #6c5ce7;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
        }
        .btn-login:hover {
            background: #5b4bc4;
            color: white;
        }
    </style>
</head>
<body>

<div class="login-card text-center">

    <h4 class="fw-bold mb-4">Admin Login</h4>

    <?php if($error): ?>
        <div class="alert alert-danger py-2 small"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="mb-3 text-start">
            <label class="form-label small fw-bold">Email Address</label>
            <input type="email" name="email" class="form-control" placeholder="user id" required>
        </div>
        <div class="mb-4 text-start">
            <label class="form-label small fw-bold">Password</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>
        <button type="submit" name="login" class="btn btn-login">Login to Dashboard</button>
    </form>
    
    <div class="mt-4">
        <a href="../index.php" class="text-muted small text-decoration-none">← Back to Website</a>
    </div>
</div>

</body>
</html>