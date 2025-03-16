<?php
$con = mysqli_connect("localhost", "root", "", "carecompass");

if (!$con) {
    echo "Connection Error: " . mysqli_connect_error();
}

$f = $_REQUEST['aname'];
$mi = $_REQUEST['adob'];
$e = $_REQUEST['anumber'];
$y = $_REQUEST['aemail'];
$p = $_REQUEST['asymtoms'];

$q = "INSERT INTO appointment (aname, adob, anumber, aemail, asymtoms, status) 
      VALUES ('$f', '$mi', '$e', '$y', '$p', 'pending')";

$r = mysqli_query($con, $q);

if ($r) {
    echo "<script>alert('Request sent Successfully!'); window.location.href = 'index.php';</script>";
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>
