<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "sports_booking");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$username = $_POST['username'];
$password = $_POST['password'];

// Validate user
$sql = "SELECT * FROM users WHERE username=? AND password=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $user['role'];

    if ($user['role'] === 'admin') {
        header("Location: admin_dashboard.html");
    } else {
        header("Location: user_dashboard.html");
    }
    exit();
} else {
    echo "<script>alert('Invalid credentials'); window.location.href='login.html';</script>";
}

$conn->close();
?>
