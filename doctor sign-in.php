<?php
$con = mysqli_connect("localhost", "root", "", "carecompass");

// Check connection
if (!$con) {
    die("Connection Error: " . mysqli_connect_error());
}

// Sanitize inputs to prevent SQL injection
$f  = mysqli_real_escape_string($con, $_REQUEST['dname']);
$mi = mysqli_real_escape_string($con, $_REQUEST['dnumber']);
$e  = mysqli_real_escape_string($con, $_REQUEST['demail']);
$y  = mysqli_real_escape_string($con, $_REQUEST['dspec']);
$p  = mysqli_real_escape_string($con, $_REQUEST['hname']);
$b  = mysqli_real_escape_string($con, $_REQUEST['dpass']);

// Ensure all required fields are filled
if (empty($f) || empty($mi) || empty($e) || empty($y) || empty($p) || empty($b)) {
    echo "<script>alert('All fields are required!');</script>";
    echo "<script>window.history.back();</script>";
    exit();
}

// Insert into database
$stmt = $con->prepare("INSERT INTO doctor (dname, dphone, demail, dspec, hname, dpass, status) 
                       VALUES (?, ?, ?, ?, ?, ?, 'pending')");
$stmt->bind_param("ssssss", $f, $mi, $e, $y, $p, $b);

$r = $stmt->execute();

if ($r) {
    echo "<script>alert('Registration Successful!');</script>";
    echo "<script>window.location='doctor login.php';</script>";
} else {
    echo "Error: " . mysqli_error($con);
}

// Close connection
mysqli_close($con);