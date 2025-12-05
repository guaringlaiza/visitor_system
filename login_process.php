<?php
session_start();
include "functions/db.php";

$conn = Connect(); // <-- FIXED: create your connection object

// Check if POST values exist
if (!isset($_POST['username']) || !isset($_POST['password'])) {
    die("Form was not submitted correctly.");
}

$user = $_POST['username'];
$pass = $_POST['password'];

// Make sure $conn exists
if (!isset($conn)) {
    die("Database connection not found. Check db.php.");
}

// SQL query
$sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
$result = mysqli_query($conn, $sql);

// Check kung may error ang query
if (!$result) {
    die("SQL Error: " . mysqli_error($conn));
}

// Check login
if (mysqli_num_rows($result) == 1) {
    $_SESSION['username'] = $user;
    header("Location: dashboard.php");
    exit;
} else {
    echo "Invalid login. <a href='login.php'>Try again</a>";
}
?>
