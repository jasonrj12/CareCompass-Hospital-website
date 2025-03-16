<?php
session_start(); // Move this to the top

$con = mysqli_connect("localhost", "root", "", "carecompass");
if (!$con) {
    die("Connection Error: " . mysqli_connect_error());
}

// Get total appointments
$q = "SELECT * FROM appointment";
$r = mysqli_query($con, $q);
if (!$r) {
    die("Error in query: " . mysqli_error($con));
}
$n = mysqli_num_rows($r);

// Get total doctors
$g = "SELECT * FROM doctor";
$t = mysqli_query($con, $g);
if (!$t) {
    die("Error in query: " . mysqli_error($con));
}
$l = mysqli_num_rows($t);

// Get total patients
$h = "SELECT * FROM patient";
$k = mysqli_query($con, $h);
if (!$k) {
    die("Error in query: " . mysqli_error($con));
}
$p = mysqli_num_rows($k);

// Get total feedback
$o = "SELECT * FROM feedback";
$u = mysqli_query($con, $o);
if (!$u) {
    die("Error in query: " . mysqli_error($con));
}
$m = mysqli_num_rows($u);

$v = $n + $l + $p; // Total users calculation

// Check session for admin
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Fetch admin data
$query = mysqli_query($con, "SELECT * FROM `admin` WHERE `adname`='" . $_SESSION['id'] . "'") or die(mysqli_error($con));
$fetch = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="ad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="page_wrap">
        <!-- Sidebar -->
        <div class="side-bar">
            <div class="name-pos">
                <h1>Hello, <?php echo $fetch['adname']; ?></h1>
                <h5>Welcome to Admin Panel</h5>
            </div>
            <div class="side-bar-nav">
                <ul>
                    <li><a href="ad.php"><span><i class="fas fa-calendar"></i></span>Appointments</a></li>
                    <li><a href="adpatient.php"><span><i class="fas fa-hospital-user"></i></span>Patient</a></li>
                    <li><a href="adapproved.php"><span><i class="fas fa-calendar-check"></i></span>Approved</a></li>
                    <li><a href="adfeedback.php"><span><i class="fas fa-address-card"></i></span>Feedback</a></li>
                    <li><a href="logout.php"><span><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="info-card">
                <div class="card">
                    <div class="card-icon"><i class="fa fa-user"></i></div>
                    <div class="card-detail"><h4>Total Users</h4><h2><?php echo $v; ?></h2></div>
                </div>
                <div class="card">
                    <div class="card-icon"><i class="fa fa-user-md"></i></div>
                    <div class="card-detail"><h4>Total Doctors</h4><h2><?php echo $l; ?></h2></div>
                </div>
                <div class="card">
                    <div class="card-icon"><i class="fa fa-calendar-check"></i></div>
                    <div class="card-detail"><h4>Total Feedback</h4><h2><?php echo $m; ?></h2></div>
                </div>
                <div class="card">
                    <div class="card-icon"><i class="fa fa-hospital-user"></i></div>
                    <div class="card-detail"><h4>Total Appointments</h4><h2><?php echo $p; ?></h2></div>
                </div>
            </div>
        </div>

        <!-- Patient Table -->
        <div class="main-content">
            <div class="main-table">
                <div class="title">
                    <h2>Patients</h2>
                </div>
                <div class="user-table">
                    <table>
                        <thead>
                            <tr>
                                <td>Patient-id</td>
                                <td>Patient-Name</td>
                                <td>Patient-DOB</td>
                                <td>Patient-Number</td>
                                <td>Patient-Email</td>
                                <td>Patient-Age</td>
                                <td>Approve</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $j = "SELECT * FROM patient WHERE status='pending' ORDER BY pid ASC";
                            $y = mysqli_query($con, $j);
                            while ($row = mysqli_fetch_array($y)) { ?>
                                <tr>
                                    <td><?php echo $row['pid']; ?></td>
                                    <td><?php echo $row['pname']; ?></td>
                                    <td><?php echo $row['pdob']; ?></td>
                                    <td><?php echo $row['pnumber']; ?></td>
                                    <td><?php echo $row['pemail']; ?></td>
                                    <td><?php echo $row['page']; ?></td>
                                    <td><a href="adpatient.php?editid=<?php echo $row['pid']; ?>" class='btn btn-raised g-bg-cyan'>Approve</a></td>
                                    <td><a href="adpatient.php?delid=<?php echo $row['pid']; ?>" class='btn' style='background: linear-gradient(to left, #df4e55, #d10035);'>Delete</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- PHP Logic for Approving/Deleting -->
        <?php
        if (isset($_GET['editid'])) {
            $sql = "UPDATE patient SET status='approved' WHERE pid='$_GET[editid]'";
            mysqli_query($con, $sql);
            echo "<script>alert('Patient record approved successfully.'); window.location='adpatient.php';</script>";
        }

        if (isset($_GET['delid'])) {
            $sql = "DELETE FROM patient WHERE pid='$_GET[delid]'";
            mysqli_query($con, $sql);
            echo "<script>alert('Patient record deleted successfully.'); window.location='adpatient.php';</script>";
        }
        ?>
    </div>
</body>
</html>
