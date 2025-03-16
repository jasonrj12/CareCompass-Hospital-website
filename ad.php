<?php
$con = mysqli_connect("localhost", "root", "", "carecompass");

if (!$con) {
    echo "Connection Error: " . mysqli_connect_error();
    exit();
}

$q = "SELECT * FROM appointment";
$r = mysqli_query($con, $q);
if (!$r) {
    echo "Error in query: " . mysqli_error($con);
}

$n = mysqli_num_rows($r);

// Doctor Query
$g = "SELECT * FROM doctor";
$t = mysqli_query($con, $g);
if (!$t) {
    echo "Error in query: " . mysqli_error($con);
}
$l = mysqli_num_rows($t);

// Patient Query
$h = "SELECT * FROM patient";
$k = mysqli_query($con, $h);
if (!$k) {
    echo "Error in query: " . mysqli_error($con);
}
$p = mysqli_num_rows($k);

// Feedback Query
$o = "SELECT * FROM feedback";
$u = mysqli_query($con, $o);
if (!$u) {
    echo "Error in query: " . mysqli_error($con);
}
$m = mysqli_num_rows($u);

// Total count
$v = $n + $l + $p;

// Start session and check login
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$query = mysqli_query($con, "SELECT * FROM `admin` WHERE `adname`='" . $_SESSION['id'] . "'") or die(mysqli_error($con));
$fetch = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="ad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="page_wrape">
        <div class="side-bar">
            <div class="name-pos">
                <h1>Hello <?php echo $fetch['adname']; ?></h1>
                <h5>Welcome to admin panel</h5>
                <div class="side-bar-nav">
                    <ul>
                        <li><a href="ad.php"><span><i class="fas fa-calendar"></i></span><span class="nav-link">Appointments</span></a></li>
                        <li><a href="addoctor.php"><span><i class="fas fa-user-nurse"></i></span><span class="nav-link">Doctor</span></a></li>
                        <li><a href="adpatient.php"><span><i class="fas fa-hospital-user"></i></span><span class="nav-link">Patient</span></a></li>
                        <li><a href="adapproved.php"><span><i class="fas fa-calendar-check"></i></span><span class="nav-link">Approved</span></a></li>
                        <li><a href="adfeedback.php"><span><i class="fas fa-address-card"></i></span><span class="nav-link">Feedback</span></a></li>
                        <li><a href="logout.php"><span><i class="fas fa-sign-out-alt"></i></span><span class="nav-link">Logout</span></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="info-card">
                <div class="card">
                    <div class="card-icon"><span><i class="fa fa-user"></i></span></div>
                    <div class="card-detail"><h4>Total Users</h4><h2><?php echo $v; ?></h2></div>
                    <p>Users</p>
                </div>
                <div class="card">
                    <div class="card-icon"><span><i class="fa fa-user-md"></i></span></div>
                    <div class="card-detail"><h4>Total Doctor</h4><h2><?php echo $l; ?></h2></div>
                    <p>Users</p>
                </div>
                <div class="card">
                    <div class="card-icon"><span><i class="fa fa-calendar-check"></i></span></div>
                    <div class="card-detail"><h4>Total Feedback</h4><h2><?php echo $m; ?></h2></div>
                    <p>Users</p>
                </div>
                <div class="card">
                    <div class="card-icon"><span><i class="fa fa-hospital-user"></i></span></div>
                    <div class="card-detail"><h4>Total Appointment</h4><h2><?php echo $p; ?></h2></div>
                    <p>Users</p>
                </div>
            </div>

            <div class="main-table">
                <div class="title">
                    <h2>General Appointments</h2>
                    <div class="user-table">
                        <table>
                            <thead>
                                <tr>
                                    <td>Patient-id</td>
                                    <td>Patient-Name</td>
                                    <td>Patient-DOB</td>
                                    <td>Patient-Number</td>
                                    <td>Patient-Email</td>
                                    <td>Patient-Symptoms</td>
                                    <td>Approve</td>
                                    <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $j = "SELECT * FROM appointment WHERE status='pending' ORDER BY aid ASC";
                                $y = mysqli_query($con, $j);
                                while ($row = mysqli_fetch_array($y)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['aid']; ?></td>
                                        <td><?php echo $row['aname']; ?></td>
                                        <td><?php echo $row['adob']; ?></td>
                                        <td><?php echo $row['anumber']; ?></td>
                                        <td><?php echo $row['aemail']; ?></td>
                                        <td><?php echo $row['asymtoms']; ?></td>
                                        <td><a href="ad.php?editid=<?php echo $row['aid']; ?>" class="btn btn-raised g-bg-cyan">Approve</a></td>
                                        <td><a href="ad.php?delid=<?php echo $row['aid']; ?>" class="btn" style="background: linear-gradient(to left, #df4e55, #d10035);">Delete</a></td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                <?php
                                if (isset($_GET['editid'])) {
                                    $select = "UPDATE appointment SET status='approved' WHERE aid = '$_GET[editid]'";
                                    $result = mysqli_query($con, $select);
                                    if (mysqli_affected_rows($con) == 1) {
                                        echo "<script>alert('Appointment record approved successfully.');</script>";
                                        echo "<script>window.location='ad.php';</script>";
                                    }
                                }

                                if (isset($_GET['delid'])) {
                                    $sql = "DELETE FROM appointment WHERE aid='$_GET[delid]'";
                                    $qsql = mysqli_query($con, $sql);
                                    if (mysqli_affected_rows($con) == 1) {
                                        echo "<script>alert('Appointment record deleted successfully.');</script>";
                                        echo "<script>window.location='ad.php';</script>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
