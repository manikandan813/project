<?php
include('session_check.php'); // Make sure user is logged in
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - BookWise</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #001f3f;
      color: #fff;
      margin: 0;
      padding: 0;
    }
    header {
      background: #004aad;
      padding: 20px;
      text-align: center;
    }
    nav {
      background: #003366;
      padding: 15px;
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
    }
    nav a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      margin: 10px;
    }
    nav a:hover {
      text-decoration: underline;
    }
    section {
      padding: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
      background: #fff;
      color: #000;
    }
    th, td {
      border: 1px solid #444;
      padding: 10px;
      text-align: center;
    }
    th {
      background: #004aad;
      color: white;
    }
    .btn {
      background: #004aad;
      color: white;
      padding: 8px 16px;
      text-decoration: none;
      border-radius: 4px;
    }
    .btn:hover {
      background: #0066cc;
    }
  </style>
</head>
<body>

<header>
  <h1>🏟️ Admin Dashboard | BookWise</h1>
</header>

<nav>
  <a href="manage_bookings.php">📅 Manage Bookings</a>
  <a href="manage_users.php">👤 Users</a>
  <a href="manage_grounds.php">⚽ Grounds</a>
  <a href="logout.php">🔒 Logout</a>
</nav>

<section>
  <h2>📅 Recent Bookings</h2>
  <table>
    <tr>
      <th>Booking ID</th>
      <th>User</th>
      <th>Sport</th>
      <th>Date</th>
      <th>Time</th>
      <th>Status</th>
    </tr>
    <tr>
      <td>101</td>
      <td>Shivani K</td>
      <td>Football</td>
      <td>2025-07-28</td>
      <td>6PM</td>
      <td>Confirmed</td>
    </tr>
    <!-- Add more rows or load dynamically -->
  </table>
</section>

</body>
</html>
