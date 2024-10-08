<?php 
session_start();

if (isset($_SESSION['registration_number']) && isset($_SESSION['student_info'])) {
    include "db_conn.php"; // Include database connection file

    // Fetch additional user details from the database
    $registration_number = $_SESSION['registration_number'];
    $sql = "SELECT * FROM student_info WHERE registration_number=?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $registration_number);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        // Display user details if found
        if ($row) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .profile-img {
            max-width: 200px;
            height: auto;
            margin-bottom: 20px;
            margin-left: 20px;
            border:1px solid #000000; padding:0px; margin:0px
        }
        .profile-details {
            margin-bottom: 20px;
        }
        .profile-details p {
            margin: 10px 0;
        }
        .logout-link {
            display: block;
            margin-top: 20px;
            color: #1494F9;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php 
            // Display profile picture if available
            if (!empty($row['img'])) {
                echo '<img class="profile-img" src="data:image/jpeg;base64,'.base64_encode($row['img']).'" alt="Profile Picture">';
            } else {
                echo '<div class="profile-img">No Profile Picture</div>';
            }
        ?>
        <div class="profile-details">
            <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
            <hr>
            <p><strong>Roll Number:</strong> <?php echo $row['roll_number']; ?></p>
            <hr>
            <p><strong>Registration Number:</strong> <?php echo $row['registration_number']; ?></p>
            <hr>
            <p><strong>Department:</strong> <?php echo $row['department_name']; ?></p>
            <hr>
            <p><strong>Year:</strong> <?php echo $row['year']; ?></p>
            <hr>
            <p><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
            <hr>
            <p><strong>Dob:</strong> <?php echo $row['dob']; ?></p>
            <hr>
            <p><strong>Institute:</strong> <?php echo $row['institute_name']; ?></p>
            <hr>
            <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
            <hr>
            <p><strong>Contact no:</strong> <?php echo $row['contact_no']; ?></p>
            <hr>
            <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
            <!-- Display other user details as needed -->
        </div>
        <a class="logout-link" href="logout.php">Logout</a>
    </div>
</body>
</html>
<?php
        } else {
            // No additional user details found
            echo "Error: Additional user details not found.";
        }
    } else {
        // SQL prepare error
        echo "Error: " . mysqli_error($conn);
    }
} else {
     header("Location: index.php");
     exit();
}
?>
