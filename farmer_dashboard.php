<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'farmer') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Farmer Dashboard</title>
</head>
<body>
  <h1>Welcome Farmer!</h1>
  <p>This is your dashboard.</p>
  <a href="logout.php">Logout</a>
</body>
</html>
