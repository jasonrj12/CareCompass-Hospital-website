<?php 
// Start session before any output
session_start();

$connection = mysqli_connect("localhost", "root", "", "carecompass");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    // Get input from the form and sanitize to prevent SQL injection
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Prepared statement to check the username and password
    $query = mysqli_prepare($connection, "SELECT * FROM patient WHERE status='approved' AND pname = ? AND ppass = ?");
    mysqli_stmt_bind_param($query, "ss", $username, $password);
    mysqli_stmt_execute($query);
    
    $result = mysqli_stmt_get_result($query);
    $row = mysqli_num_rows($result);

    if ($row > 0) {
        $fetch = mysqli_fetch_array($result);
        $_SESSION['id'] = $fetch['pid'];
        echo "<script>alert('Login Successfully!')</script>";
        echo "<script>window.location='patient-profile.php'</script>";
    } else {
        echo "<script>alert('Invalid username or password/not approved')</script>";
        echo "<script>window.location='Patient Login.php'</script>";
    }

    // Close the statement
    mysqli_stmt_close($query);
}
?>
