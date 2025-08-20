<?php
session_start();
$conn = new mysqli("localhost", "root", "", "sports_booking");

if (!isset($_SESSION['username'])) exit("Login first!");

$userRes = $conn->query("SELECT id FROM users WHERE username = '{$_SESSION['username']}'");
$user = $userRes->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO reviews (user_id, facility_id, rating, comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $user['id'], $_POST['facility_id'], $_POST['rating'], $_POST['comment']);
    $stmt->execute();
    echo "Review submitted.";
}
?>

<form method="POST">
    Facility ID: <input type="number" name="facility_id" required><br>
    Rating (1-5): <input type="number" name="rating" min="1" max="5" required><br>
    Comment: <textarea name="comment" required></textarea><br>
    <button type="submit">Submit Review</button>
</form>
