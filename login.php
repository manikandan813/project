<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sports_booking";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
  $user = $result->fetch_assoc();

  // ✅ Check if password matches
  if (password_verify($password, $user['password'])) {
    // ✅ Start session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    // ✅ Redirect to admin dashboard
    header("Location: admin_dashboard.php");
    exit(); // always exit after a redirect
  } else {
    echo "<script>alert('Incorrect password.'); window.history.back();</script>";
  }
} else {
  echo "<script>alert('No account found. Please register.'); window.location.href = 'register.html';</script>";
}

$stmt->close();
$conn->close();
?>

