<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crop_name = $_POST['crop_name'];
    $acres = $_POST['acres'];
    $year = $_POST['cultivation_year'];
    $fertilizers = $_POST['fertilizers'];
    $pesticides = $_POST['pesticides'];

    $sql = "INSERT INTO farm_details (user_id, crop_name, acres, cultivation_year, fertilizers, pesticides)
            VALUES ('$user_id', '$crop_name', '$acres', '$year', '$fertilizers', '$pesticides')";

    if (mysqli_query($conn, $sql)) {
        echo "Farm details added!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php
// role.php (Choose Role Page)
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Select Your Role</title>
  <style>
    body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('https://tse1.mm.bing.net/th/id/OIP.JilJ5PXf9Pf7UH4N9YD5wgHaE8?rs=1&pid=ImgDetMain&o=7&rm=3');
            background-size: cover;


      padding: 0;
     
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;

        }

    .container {
      text-align: center;
      background: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      width: 400px;
    }
    h1 {
      color: #2f7a3e;
      margin-bottom: 20px;
    }
    .btn {
      display: block;
      background: #2f7a3e;
      color: white;
      padding: 14px;
      margin: 15px 0;
      border-radius: 8px;
      text-decoration: none;
      font-size: 18px;
      font-weight: bold;
      transition: 0.3s;
    }
    .btn:hover {
      background: #25632f;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Who Are You?</h1>
    <a href="register.php" class="btn">🌱 I am a Farmer😎 </a>
    <a href="register2.php" class="btn">👷 I am a Worker💪 </a>
  </div>

</body>
</html>