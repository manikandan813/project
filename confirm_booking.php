<?php
session_start();
$conn = new mysqli("localhost", "root", "", "sports_booking");

$username = $_SESSION['username'];
$res = $conn->query("SELECT id FROM users WHERE username='$username'");
$user = $res->fetch_assoc();

$user_id = $user['id'];
$facility_id = $_POST['facility_id'];
$booking_date = $_POST['booking_date'];
$time_slot = $_POST['time_slot'];

$stmt = $conn->prepare("INSERT INTO bookings (user_id, facility_id, booking_date, time_slot) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iiss", $user_id, $facility_id, $booking_date, $time_slot);
$stmt->execute();

echo "Booking successful! <a href='dashboard.php'>Go to Dashboard</a>";
?>
