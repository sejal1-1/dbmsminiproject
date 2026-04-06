<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$user_id'");
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f9f4;
      margin: 0;
      padding: 0;
    }
    nav {
      background: #25632f;
      padding: 10px;
      text-align: center;
    }
    nav a {
      color: white;
      margin: 0 15px;
      text-decoration: none;
      font-weight: bold;
    }
    nav a:hover {
      text-decoration: underline;
    }
    .container {
      max-width: 800px;
      margin: auto;
      padding: 30px;
      background: white;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      border-radius: 10px;
      margin-top: 40px;
    }
    .btn {
      display: inline-block;
      background: #2f7a3e;
      color: white;
      padding: 10px 18px;
      border-radius: 6px;
      text-decoration: none;
      margin-top: 20px;
    }
    .btn:hover {
      background: #25632f;
    }
  </style>
</head>
<body>

<nav>
  <a href="homepage.php">Home</a>
  <a href="dashboard.php">Dashboard</a>
  <a href="logout.php">Logout</a>
</nav>

<div class="container">
  <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h1>
  <p><strong>Role:</strong> <?php echo htmlspecialchars($user['role']); ?></p>
  <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
  <p><strong>Location:</strong> <?php echo htmlspecialchars($user['location']); ?></p>

  <a href="logout.php" class="btn">Logout</a>
</div>

</body>
</html>
