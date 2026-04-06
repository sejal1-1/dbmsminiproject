<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $workType = implode(", ", $_POST['workType']);
    $startdate = $_POST['startdate'];
    $wage = $_POST['wage'];
    $experience = $_POST['experience'];
    $skills = $_POST['skills'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    $file_name = $_FILES['idproof']['name'];
    $file_tmp = $_FILES['idproof']['tmp_name'];
    $file_path = "uploads/" . $file_name;

    if ($password !== $confirmpassword) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        move_uploaded_file($file_tmp, $file_path);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO helpers (
                    name, email, contact, gender, dob, location,
                    work_type, start_date, expected_wage, experience_years,
                    skills, id_proof_path, password
                ) VALUES (
                    '$fullname', '$email', '$phone', '$gender', '$dob', '$address',
                    '$workType', '$startdate', '$wage', '$experience',
                    '$skills', '$file_path', '$hashed_password'
                )";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert into users table for login
$insertUser = "INSERT INTO users (name, email, password, role, location)
               VALUES ('$fullname', '$email', '$hashed_password', 'worker', '$address')";

mysqli_query($conn, $insertUser);
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Worker registered successfully!');</script>";
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
    <title>Farm Worker Registration</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('https://t3.ftcdn.net/jpg/02/86/02/22/360_F_286022279_zTU2R0YbUwWRS9esGbtB2dUuEnWaZ3pO.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.4); /* Dark overlay for contrast */
            padding: 40px 20px;
            min-height: 100vh;
        }

        .container {
            background: rgba(255, 255, 255, 0.95); /* Semi-transparent white */
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

        input[type="file"] {
            border: none;
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
        <h2>Farm Worker Registration Form</h2>
       <form action="register2.php" method="POST" enctype="multipart/form-data">
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
                <label for="address">Current Address *</label>
                <textarea id="address" name="address" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label>Preferred Work Type *</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="workType[]" value="planting">Planting</label>
                    <label><input type="checkbox" name="workType[]" value="harvesting">Harvesting</label>
                    <label><input type="checkbox" name="workType[]" value="animal-care">Animal Care</label>
                    <label><input type="checkbox" name="workType[]" value="irrigation">Irrigation</label>
                    <label><input type="checkbox" name="workType[]" value="fertilizing">Fertilizing</label>
                </div>
            </div>

            <div class="form-group">
                <label for="startdate">Available Start Date *</label>
                <input type="date" id="startdate" name="startdate" required>
            </div>

            <div class="form-group">
                <label for="wage">Expected Daily Wage *</label>
                <input type="number" id="wage" name="wage" min="0" required>
            </div>

            <div class="form-group">
                <label for="experience">Years of Experience *</label>
                <input type="number" id="experience" name="experience" min="0" required>
            </div>

            <div class="form-group">
                <label for="skills">Skills Description *</label>
                <textarea id="skills" name="skills" rows="3" placeholder="E.g., Tractor driving, animal care..." required></textarea>
            </div>

            <div class="form-group">
                <label for="idproof">Upload ID Proof (PDF/JPG/PNG) *</label>
                <input type="file" id="idproof" name="idproof" accept=".pdf,.jpg,.jpeg,.png" required>
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
    </div>
</div>

</body>
</html>