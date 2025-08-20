<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sports_booking";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
  echo "<script>alert('Registration successful! Redirecting to login.'); window.location.href = 'login.html';</script>";
} else {
  echo "<script>alert('Error: Email already exists or invalid data'); window.history.back();</script>";
}

$stmt->close();
$conn->close();
?>
