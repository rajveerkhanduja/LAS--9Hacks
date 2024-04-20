<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login - Laundry Automation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="container__content">
            <div class="container__ele">
                <h1>Student Log In</h1>
            </div>
            <h6><i class="ri-information-2-fill"></i> Students must use their college RegisterID</h6>
            <form action="login.php" method="post">
                <label for="regd">Regd No</label>
                <div class="input__row">
                    <input type="text" id="regd" name="regd" placeholder="Enter Your RegisterID" required/>
                </div>
                <div class="input__header">
                    <label for="password">Password</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <div class="input__row">
                    <input type="password" id="password" name="password" placeholder="Password" required/>
                    <span id="password-eye"><i class="ri-eye-off-line"></i></span>
                </div>
                <button type="submit">LOGIN</button>
            </form>
        </div>
        <div class="container__image"></div>
    </div>
</body>
</html>

<?php
session_start();

// Database connection parameters
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "laundry";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the submitted registration ID and password from the POST request
$regd = $_POST['regd'];
$submittedPassword = $_POST['password'];

// Fixed password for validation
$correctPassword = "123456";

// Prepare and execute the SQL statement to check if the registration ID exists in the database
$sql = "SELECT COUNT(*) FROM info WHERE Regd = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $regd);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();

// Check if the registration ID is found in the database
if ($count > 0) {
    // Compare the provided password with the correct password
    if ($submittedPassword === $correctPassword) {
        // Store the registration ID in a session variable and redirect
        $_SESSION['regd'] = $regd;
        header("Location: http://localhost/Laundry-Automation/Student/student.php?regd=$regd");
        exit();
    } else {
        echo "<script>alert('Invalid password. Please try again.');</script>";
    }
} else {
    echo "<script>alert('No user found with the given registration ID.');</script>";
}

// Clean up resources
$stmt->close();
$conn->close();
?>


