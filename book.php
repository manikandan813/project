<?php
session_start();
$conn = new mysqli("localhost", "root", "", "sports_booking");

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

$result = $conn->query("SELECT * FROM facilities WHERE availability = 1");

echo "<h2>Book a Facility</h2>";
echo "<form method='post' action='confirm_booking.php'>";
echo "Select Facility: <select name='facility_id'>";
while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['id']}'>{$row['name']} ({$row['type']})</option>";
}
echo "</select><br><br>";
echo "Date: <input type='date' name='booking_date' required><br><br>";
echo "Time Slot: <input type='text' name='time_slot' required><br><br>";
echo "<input type='submit' value='Book'>";
echo "</form>";
?>
