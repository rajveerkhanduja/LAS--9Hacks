<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code - Laundry Automation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        video {
            width: 100%;
            max-width: 600px;
            height: auto;
            border: 2px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Scan QR Code</h1>
        <video id="preview" aria-label="QR Code Scanner"></video>
        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <script>

            const scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });

            scanner.addListener('scan', function(content) {
                window.location.href = 'admin.php?regd=' + encodeURIComponent(content);
            });

            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    alert('No cameras found. Please use a device with a camera.');
                }
            }).catch(function(error) {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        </script>

        <button onclick="window.location.href='http://localhost/Laundry-Automation/Auth/login.php'">Go to Login</button>
    </div>

    <?php

    if (isset($_GET['regd'])) {

        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $database = "laundry";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            echo '<script>alert("Failed to connect to the database.");</script>';
        } else {
            $regd = trim($_GET['regd']);

            $sql = "SELECT * FROM `info` WHERE Regd = '" . $regd . "'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                $status = $row['status'];
                $washes = $row['washes'];

                if ($status == 'Done' && $washes == 0) {
                    echo '<script>alert("Your washes have been used!");</script>';
                } elseif ($status == 'Done') {
                    $updateSql = "UPDATE info SET status = 'Pending' WHERE Regd = '" . $regd . "'";
                    mysqli_query($conn, $updateSql);
                    echo '<script>alert("Status updated to Pending.");</script>';
                } elseif ($status == 'Pending') {
                    $updateSql = "UPDATE info SET status = 'Done', washes = washes - 1 WHERE Regd = '" . $regd . "'";
                    mysqli_query($conn, $updateSql);
                    echo '<script>alert("Status updated to Done.");</script>';
                }
            } else {
                echo '<script>alert("No records found for the given registration number.");</script>';
            }

            mysqli_close($conn);
        }
    }
    ?>
</body>
</html>
