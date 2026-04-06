<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $farmaddress = $_POST['farmaddress'];
    $farmsize = $_POST['farmsize'];
    $idproof = $_POST['idproof'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if ($password !== $confirmpassword) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password, role, location)
                VALUES ('$fullname', '$email', '$hashed_password', 'farmer', '$farmaddress')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registration successful!');</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Farmer Registration Form</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('https://t3.ftcdn.net/jpg/08/04/22/42/360_F_804224219_QdNW7DlskOWvDzon8xM4LQuxX62bdvdm.jpg');
            background-size: cover;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.4);
            padding: 40px 20px;
            min-height: 100vh;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            max-width: 650px;
            margin: auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
        }

        h2 {
            text-align: center;
            color: #2e7d32;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        input[type="date"],
        input[type="password"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #bbb;
            border-radius: 6px;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
        }

        .checkbox-group label {
            margin-right: 15px;
            font-weight: normal;
        }

        button {
            background-color: #2e7d32;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #256428;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .checkbox-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<div class="overlay">
    <div class="container">
        <h2>Farmer Registration Form</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="fullname">Full Name *</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number *</label>
                <input type="tel" id="phone" name="phone" required pattern="[0-9]{10}">
            </div>

            <div class="form-group">
                <label for="gender">Gender *</label>
                <select id="gender" name="gender" required>
                    <option value="">--Select Gender--</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth *</label>
                <input type="date" id="dob" name="dob" required>
            </div>

            <div class="form-group">
                <label for="farmaddress">Farm Address *</label>
                <textarea id="farmaddress" name="farmaddress" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="farmsize">Farm Size (in acres) *</label>
                <input type="number" id="farmsize" name="farmsize" min="0" step="0.1" required>
            </div>

            <div class="form-group">
                <label for="idproof">Aadhar Number *</label>
                <input type="number" id="idproof" name="idproof"  required>
            </div>

            <div class="form-group">
                <label for="password">Password *</label>
                <input type="password" id="password" name="password" required minlength="6">
            </div>

            <div class="form-group">
                <label for="confirmpassword">Confirm Password *</label>
                <input type="password" id="confirmpassword" name="confirmpassword" required minlength="6">
            </div>

            <button type="submit">Register</button>
        </form>
        <p>
    </div>
</div>

</body>
</html>