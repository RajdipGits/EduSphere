<!doctype html>
<html lang="en">
<head>
    <title>Student Management System</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bootstrap 4/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/fw/css/all.min.css">

    <style>
        .navbar-nav .nav-link {
            color: white !important;
        }
        .navbar-custom {
            background-color: blueviolet !important;
        }
        .nav-item-custom {
            margin-right: 0px; /* Customize spacing between items */
        }
        .nav-item-last {
            margin-right: 1000px; /* Remove margin from last item */
        }
        .table-container {
            margin-top: 20px;
        }
        .table th, .table td {
            vertical-align: middle !important;
            text-align: center;
        }
        .table th {
            background-color: #f8f9fa;
        }
        .table img {
            width: 100px;
            height: auto;
        }
        .filter-container {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>

<!-- Nav bar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Student Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item nav-item-last">
                    <a class="nav-link" href="#">Student Entry</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- end of nav bar -->

<div class="container">
    <div class="filter-container">
        <div class="form-group">
            <label for="filter-year">Select Year</label>
            <select class="form-control" id="filter-year">
                <option value="">All Years</option>
                <!-- Add options dynamically based on available years -->
                <?php
                // Establish database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "sms";

                $conn = mysqli_connect($servername, $username, $password, $dbname);

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT DISTINCT year FROM STUDENT_INFO";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["year"] . "'>" . $row["year"] . "</option>";
                    }
                }

                mysqli_close($conn);
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="filter-department">Select Department</label>
            <select class="form-control" id="filter-department">
                <option value="">All Departments</option>
                <!-- Add options dynamically based on available departments -->
                <?php
                // Establish database connection again if not already established
                $conn = mysqli_connect($servername, $username, $password, $dbname);

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT DISTINCT department_name FROM STUDENT_INFO";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["department_name"] . "'>" . $row["department_name"] . "</option>";
                    }
                }

                mysqli_close($conn);
                ?>
            </select>
        </div>
    </div>
    <div class="table-container">
        <h2>Student Information</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Roll Number</th>
                        <th>Registration Number</th>
                        <th>Father Name</th>
                        <th>Mother Name</th>
                        <th>Department</th>
                        <th>Year</th>
                        <th>Fees</th>
                        <th>Institute Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Contact No</th>
                        <th>WhatsApp No</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Aadhaar Image</th>
                        <th>Marksheet Image</th>
                        <th>Profile Image</th>
                        <th>Signature</th>
                        <th>Pay</th>
                        <th>Receipt</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="student-data">
                    <?php
                    error_reporting(0);
                    // Establish database connection again if not already established
                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT * FROM STUDENT_INFO";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // Output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["roll_number"] . "</td>";
                            echo "<td>" . $row["registration_number"] . "</td>";
                            echo "<td>" . $row["father_name"] . "</td>";
                            echo "<td>" . $row["mother_name"] . "</td>";
                            echo "<td>" . $row["department_name"] . "</td>";
                            echo "<td>" . $row["year"] . "</td>";
                            echo "<td>" . $row["fees"] . "</td>";
                            echo "<td>" . $row["institute_name"] . "</td>";
                            echo "<td>" . $row["dob"] . "</td>";
                            echo "<td>" . $row["gender"] . "</td>";
                            echo "<td>" . $row["contact_no"] . "</td>";
                            echo "<td>" . $row["whatsapp_no"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["address"] . "</td>";
                            echo "<td><img src='data:image/jpeg;base64,".base64_encode($row['aadhaar_img'])."' alt='Aadhaar Image' class='img-fluid'/></td>";
                            echo "<td><img src='data:image/jpeg;base64,".base64_encode($row['marksheet_img'])."' alt='Marksheet Image' class='img-fluid'/></td>";
                            echo "<td><img src='data:image/jpeg;base64,".base64_encode($row['img'])."' alt='Profile Image' class='img-fluid'/></td>";
                            echo "<td><img src='data:image/jpeg;base64,".base64_encode($row['sig'])."' alt='Signature' class='img-fluid'/></td>";
                            echo "<td><img src='data:image/jpeg;base64,".base64_encode($row['receipt'])."' alt='Receipt' class='img-fluid'/></td>";
                            echo "<td>" . $row["pay"] . "</td>";
                            echo "<td>
                                    <button class='btn btn-primary btn-sm update-btn' data-id='" . $row["id"] . "'>Update</button>
                                    <button class='btn btn-danger btn-sm delete-btn' data-id='" . $row["id"] . "'>Delete</button>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='22'>No records found</td></tr>";
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

<script>
    document.getElementById('filter-year').addEventListener('change', filterTable);
    document.getElementById('filter-department').addEventListener('change', filterTable);

    function filterTable() {
        var year = document.getElementById('filter-year').value;
        var department = document.getElementById('filter-department').value;
        var table = document.getElementById('student-data');
        var tr = table.getElementsByTagName('tr');

        for (var i = 0; i < tr.length; i++) {
            var tdYear = tr[i].getElementsByTagName('td')[6]; // Year column index
            var tdDepartment = tr[i].getElementsByTagName('td')[5]; // Department column index

            if (tdYear && tdDepartment) {
                var yearValue = tdYear.textContent || tdYear.innerText;
                var departmentValue = tdDepartment.textContent || tdDepartment.innerText;

                if ((year === "" || yearValue === year) && (department === "" || departmentValue === department)) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Placeholder function for update and delete button actions
    $(document).ready(function() {
        $('.update-btn').click(function() {
            var id = $(this).data('id');
            alert('Update button clicked for student ID: ' + id);
            // Add your update logic here (e.g., open update modal)
        });

        $('.delete-btn').click(function() {
            var id = $(this).data('id');
            if (confirm('Are you sure you want to delete student ID: ' + id + '?')) {
                alert('Delete button clicked for student ID: ' + id);
                // Add your delete logic here (e.g., AJAX call to delete record)
            }
        });
    });
</script>

</body>
</html>
