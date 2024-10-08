<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /* Custom styles */
        .custom-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
        }
        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: -1;
        }
    </style>  
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: rgb(175, 42, 232) !important;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Student Management System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            </div>
        </div>
    </nav>
<br><br><br>
<?php
error_reporting(E_ALL); // Enable all error reporting for debugging
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $servername = "localhost";
    $username = "root"; // Change this to your actual username
    $password = ""; // Change this to your actual password
    $dbname = "sms";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        // echo "<div style='color:black;'><h2>Connected successfully to database</h2></div><br>";
    }
    
    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO STUDENT_INFO (name, roll_number, registration_number, father_name, mother_name, department_name, year, fees, institute_name, dob, gender, contact_no, whatsapp_no, email, address, aadhaar_img, marksheet_img, img, sig, pay, receipt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Check if the statement was prepared successfully
    if (!$stmt) {
        die("Error in preparing statement: " . $conn->error);
    }
    
    // Set parameters and execute
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $roll_number = isset($_POST['roll_number']) ? $_POST['roll_number'] : '';
    $registration_number = isset($_POST['registration_number']) ? $_POST['registration_number'] : '';
    $father_name = isset($_POST['father_name']) ? $_POST['father_name'] : '';
    $mother_name = isset($_POST['mother_name']) ? $_POST['mother_name'] : '';
    $department_name = isset($_POST['department_name']) ? $_POST['department_name'] : '';
    $year = isset($_POST['year']) ? $_POST['year'] : '';
    $fees = isset($_POST['fees']) ? $_POST['fees'] : '';
    $institute_name = isset($_POST['institute_name']) ? $_POST['institute_name'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $contact_no = isset($_POST['contact_no']) ? $_POST['contact_no'] : '';
    $whatsapp_no = isset($_POST['whatsapp_no']) ? $_POST['whatsapp_no'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $aadhaar_img = isset($_FILES['aadhaar_img']['tmp_name']) ? file_get_contents($_FILES['aadhaar_img']['tmp_name']) : null;
    $marksheet_img = isset($_FILES['marksheet_img']['tmp_name']) ? file_get_contents($_FILES['marksheet_img']['tmp_name']) : null;
    $img = isset($_FILES['img']['tmp_name']) ? file_get_contents($_FILES['img']['tmp_name']) : null;
    $sig = isset($_FILES['sig']['tmp_name']) ? file_get_contents($_FILES['sig']['tmp_name']) : null;
    $pay = isset($_POST['pay']) ? $_POST['pay'] : '';
    $receipt = isset($_FILES['receipt']) ? file_get_contents($_FILES['receipt']['tmp_name']) : null;
    
    $stmt->bind_param("sssssssssssssssssssss", $name, $roll_number, $registration_number, $father_name, $mother_name, $department_name, $year, $fees, $institute_name, $dob, $gender, $contact_no, $whatsapp_no, $email, $address, $aadhaar_img, $marksheet_img, $img, $sig, $pay, $receipt);
    
    if ($stmt->execute()) {
        echo "<center><h3>Register Successfully</center></h3";
        "<button type=button class=btn btn-primary btn-lg href=/EduSphere/student/index.php>Large button</button>";
    } else {
        // Check if the error code indicates a duplicate entry error
        if ($conn->errno == 1062) {
            echo "<center><h3>You Are Already Registered</center></h3>";
            "<button type=button class=btn btn-primary btn-lg href=/EduSphere/student/index.php>Large button</button>";
        } else {
            // echo "Failed to insert data: " . $stmt->error;
        }
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
    <!-- Button -->
    <div class="custom-button">
        <a class="btn btn-primary" href="/EduSphere/student/index.php">Return to the Login Page </a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
