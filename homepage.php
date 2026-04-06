<?php
session_start();
$loggedIn = isset($_SESSION['user_id']);
?>
<?php
// index.php (Home Page)
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Agriculture & Resource Management</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f4f9f4;
    }
    header {
       background: url('https://tse2.mm.bing.net/th/id/OIP.TlIbbLnzdsBW6ZtW4vIYBwHaCf?rs=1&pid=ImgDetMain&o=7&rm=3');
      background-size: cover;
      color: white;
      padding: 20px;
      text-align: center;
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
      max-width: 1000px;
      margin: auto;
      padding: 20px;
    }
    .card {
      background: #fff;
      padding: 25px;
      margin: 20px 0;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    h2 {
      color: #2f7a3e;
    }
    p {
      line-height: 1.6;
      color:#333;
    }
    .btn {
      display: inline-block;
      background: #2f7a3e;
      color: white;
      padding: 12px 20px;
      border-radius: 6px;
      text-decoration: none;
      margin-top: 15px;
    }
    .btn:hover {
      background: #25632f;
    }
    footer {
      text-align: center;
      padding: 15px;
      background: #2f7a3e;
      color: white;
      margin-top: 20px;
    }
  </style>
</head>
<body>
<div id="google_translate_element" style="text-align:right; margin:10px;"></div>


  <header>
    <h1>Agriculture & Resource Management</h1>
    <p style="color:white">Helping Farmers Manage Resources Efficiently</p>
  </header>

  <nav>
    <a href="homepage.php">Home</a>
    <a href="farmresource.php">Farmer Resources</a>
    <a href="fwregister.php">Register</a>
    <a href="login.php">Login</a>
  </nav>

  <div class="container">
<?php if ($loggedIn): ?>
  <div class="card">
    <h2>Welcome to agriculture and farm resources management. </h2>
    <p>Create your Dashboard. Head to your dashboard to manage your farm data and explore new resources.</p>
    <a href="fwregister.php" class="btn">Create Dashboard</a>
  </div>
<?php endif; ?>
    <!-- Farmer Resources Section -->
    <div class="card">
      <h2>Government Schemes</h2>
      <p>We provide guidance on modern farming schemes provided by government. Click Explore Schemes.</p>
      <a href="resources.php" class="btn">Explore Schemes</a>
    </div>

  </div>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> Agriculture & Resource Management | All Rights Reserved</p>
  </footer>

</body>
</html>