<?php
 error_reporting(0);
// Get the email and password from POST
$email = $_POST['email'];
$password = $_POST['password'];
// Connect to the database
$con = new mysqli("localhost", "root", "", "sms");
// Check connection
if ($con->connect_error) {
    die("Failed to connect: " . $con->connect_error);
} else {
    // Prepare and bind
    $stmt = $con->prepare("SELECT * FROM admin_info WHERE email = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $con->error);
    }
    $bind = $stmt->bind_param("s", $email);
    if ($bind === false) {
        die("Bind failed: " . $stmt->error);
    }
    $exec = $stmt->execute();
    if ($exec === false) {
        die("Execute failed: " . $stmt->error);
    }
    $stmt_result = $stmt->get_result();
    if ($stmt_result === false) {
        die("Getting result set failed: " . $stmt->error);
    }
    // Check if user exists
    if ($stmt_result->num_rows > 0) {
        // Fetch user data
        $data = $stmt_result->fetch_assoc();
        // Verify password
        if ($data['password'] === $password) { // If you are storing hashed passwords, use password_verify
            // Redirect to main page
            header("Location: ../index/admin.php");
            exit; // Ensure script execution stops after redirection
        } else {
            echo "<div style='text-align: center; margin-top: 20px;'><h2>Invalid Password</h2></div>";
        }
    } else {
        echo "<div style='text-align: center; margin-top: 20px;'><h2>Invalid Email</h2></div>";
    }
    // Close statement and connection
    $stmt->close();
    $con->close();
}
?>