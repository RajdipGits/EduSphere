<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['name']) && isset($_POST['roll_number'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $name = validate($_POST['name']);
    $roll_number = validate($_POST['roll_number']);

    if (empty($name)) {
        header("Location: index.php?error=User Name is required");
        exit();
    } else if (empty($roll_number)) {
        header("Location: index.php?error=Roll number is required");
        exit();
    } else {
        // Prepare SQL statement to prevent SQL injection
        $sql = "SELECT * FROM student_info WHERE name=? AND roll_number=?";
        $stmt = mysqli_stmt_init($conn);
        if (!$stmt) {
            // Check for initialization failure
            die('Statement initialization failed: ' . mysqli_error($conn));
        }
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            // Check for SQL prepare error
            die('SQL Prepare Error: ' . mysqli_error($conn));
        } else {
            // Bind parameters to the prepared statement
            mysqli_stmt_bind_param($stmt, "ss", $name, $roll_number);
            // Execute the prepared statement
            if (!mysqli_stmt_execute($stmt)) {
                // Check for SQL execute error
                die('SQL Execute Error: ' . mysqli_error($conn));
            } else {
                // Get result
                $result = mysqli_stmt_get_result($stmt);
                // Check if result has rows
                if ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['student_info'] = $row['name'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['registration_number'] = $row['registration_number'];
                    header("Location: home.php");
                    exit();
                } else {
                    header("Location: index.php?error=Incorrect user name or password");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
