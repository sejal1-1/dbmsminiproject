<?php
session_start();
session_unset();
session_destroy();
header("Location: homepage.php");
exit();?>
<?php if (isset($_SESSION['user_id'])): ?>
  <a href="dashboard.php">Dashboard</a>
  <a href="logout.php">Logout</a>
<?php else: ?>
  <a href="login.php">Login</a>
<?php endif; ?>