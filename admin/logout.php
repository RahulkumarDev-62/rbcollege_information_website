<?php
// Session शुरू करें
session_start();

// सभी Session variables को हटा दें
$_SESSION = array();

// यदि Session Cookie मौजूद है, तो उसे भी नष्ट करें
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Session को पूरी तरह नष्ट करें
session_destroy();

// Logout के बाद Login page या Home page पर भेजें
header("Location: ../index.php");
exit;
?>