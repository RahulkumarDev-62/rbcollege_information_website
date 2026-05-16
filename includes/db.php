<?php
$host = "localhost";
$user = "user"; 
$pass = "password"; 
$dbname = "db";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>