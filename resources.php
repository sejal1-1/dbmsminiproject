<?php
include 'db.php';

// Fetch all schemes from the database
$schemes = [];
$sql = "SELECT * FROM schemes";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $schemes[] = $row;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Farmer Resources</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f4f9f4;
    }
    header {
      background: #2f7a3e;
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
      padding: 20px;
      margin: 20px 0;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    h2 {
      color: #2f7a3e;
      margin-bottom: 10px;
    }
    p {
      line-height: 1.6;
      color: #333;
    }
    ul {
      padding-left: 20px;
      color: #333;
    }
    .btn {
      display: inline-block;
      background: #2f7a3e;
      color: white;
      padding: 10px 18px;
      border-radius: 6px;
      text-decoration: none;
      margin-top: 10px;
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

  <header>
    <h1>Farmer Resources</h1>
    <p>Useful Guides & Tools for Farmers</p>
  </header>

  <nav>
    <a href="homepage.php">Home</a>
    <a href="resources.php">Farmer Resources</a>
    <a href="register.php">Register</a>
    <a href="login.php">Login</a>
  </nav>

  <div class="container">
    <div class="card">
      <h2>Government Schemes & Support</h2>
      <p>Information on subsidies, loans, and training programs for farmers.</p>
      <ul>
        <!-- Dynamic schemes from database -->
        <?php if (!empty($schemes)): ?>
          <?php foreach ($schemes as $scheme): ?>
            <li>
              <strong><?php echo htmlspecialchars($scheme['title']); ?></strong><br>
              <?php echo nl2br(htmlspecialchars($scheme['description'])); ?><br>
              <a href="<?php echo htmlspecialchars($scheme['link']); ?>" target="_blank" class="btn">Learn More</a>
            </li>
            <br>
          <?php endforeach; ?>
        <?php endif; ?>

        <!-- Static government schemes -->
        <li>
          <strong>PM-KISAN Samman Nidhi Yojana</strong><br>
          Financial support of ₹6,000/year to eligible farmers.<br>
          <a href="https://pmkisan.gov.in/" target="_blank" class="btn">Visit PM-KISAN Portal</a>
        </li>
        <br>

        <li>
          <strong>PM-Kisan Maandhan Yojana (PM-KMY)</strong><br>
          Pension scheme for small and marginal farmers aged 18–40.<br>
          <a href="https://nfwpis.da.gov.in/" target="_blank" class="btn">Register for PM-KMY</a>
        </li>
        <br>

        <li>
          <strong>National Farmers Welfare Program</strong><br>
          Unified platform for farmer registration, KCC, and scheme tracking.<br>
          <a href="https://nfwpis.da.gov.in/" target="_blank" class="btn">Explore Services</a>
        </li>
        <br>

        <li>
          <strong>e-SHRAM Portal for Workers</strong><br>
          National database for unorganized workers with social security benefits.<br>
          <a href="https://eshram.gov.in/" target="_blank" class="btn">Go to e-SHRAM</a>
        </li>
      </ul>
    </div>
  </div>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> Agriculture & Resource Management | All Rights Reserved</p>
  </footer>

</body>
</html>
