<?php
session_start();
if ($_SESSION['role'] === 'admin') {
    header("Location: admin_dashboard.html");
} else {
    header("Location: user_dashboard.html");
}
exit();
?>
