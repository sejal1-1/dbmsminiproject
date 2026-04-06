<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Secure query using prepared statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['role'] = $user['role'];

        // Role-based redirection
        if ($user['role'] === 'farmer') {
            header("Location: farmer_dashboard.php");
        } elseif ($user['role'] === 'worker') {
            header("Location: worker_dashboard.php");
        } elseif ($user['role'] === 'equipment_owner') {
            header("Location: equipment_dashboard.php");
        } else {
            header("Location: dashboard.php"); // fallback
        }
        exit();
    } else {
        echo "<script>alert('Invalid email or password'); window.location.href='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: url('https://images.unsplash.com/photo-1583337130417-203c0f95e84a?auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;
    }

    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(200, 255, 200, 0.3);
      z-index: 0;
    }

    .login-box {
      position: relative;
      z-index: 1;
      width: 100%;
      max-width: 350px;
      padding: 30px;
      background: rgba(255, 255, 255, 0.95);
      border-left: 10px solid #a8e6a3;
      box-shadow: 0 8px 20px rgba(0,0,0,0.3);
      border-radius: 10px;
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    .login-box input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }

    .login-box input:focus {
      border-color: #4CAF50;
      outline: none;
    }

    .login-box button {
      width: 100%;
      padding: 12px;
      margin-top: 15px;
      background: #4CAF50;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    .login-box button:hover {
      background: #45a049;
    }

    @media (max-width: 400px) {
      .login-box {
        padding: 20px;
        margin: 20px;
        border-left: 6px solid #a8e6a3;
      }
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login</h2>
    <form method="POST" action="login.php">
      <input type="email" name="email" placeholder="Enter Email" required>
      <input type="password" name="password" placeholder="Enter Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>