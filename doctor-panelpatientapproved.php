<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "carecompass");

if (!$con) {
    die("Connection Error: " . mysqli_connect_error());
}

// Fetch Total Counts
$q = "SELECT * FROM appointment";
$r = mysqli_query($con, $q);
$n = mysqli_num_rows($r);

$g = "SELECT * FROM doctor";
$t = mysqli_query($con, $g);
$l = mysqli_num_rows($t);

$h = "SELECT * FROM patient";
$k = mysqli_query($con, $h);
$p = mysqli_num_rows($k);

$v = $n + $l + $p;

$o = "SELECT * FROM feedback";
$u = mysqli_query($con, $o);
$m = mysqli_num_rows($u);

// Get Doctor Details
if (isset($_SESSION['id'])) {
    $query = mysqli_query($con, "SELECT * FROM `doctor` WHERE `did`='" . $_SESSION['id'] . "'") or die(mysqli_error($con));
    $fetch = mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Panel</title>
    <link rel="stylesheet" href="ad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<div class="page_wrape">
    <!-- Sidebar -->
    <div class="side-bar">
        <div class="name-pos">
            <?php if (isset($fetch)) { ?>
                <h1>Hello <?php echo $fetch['dname']; ?></h1>
                <h5>Welcome to Doctor Panel</h5>
            <?php } ?>
        </div>
        <div class="side-bar-nav">
            <ul>
                <li><a href="doctor-profile.php"><i class="fas fa-address-card"></i> Profile</a></li>
                <li><a href="doctor-panel.php"><i class="fas fa-calendar"></i> Appointments</a></li>
                <li><a href="doctor-panelpatient.php"><i class="fas fa-hospital-user"></i> Patients</a></li>
                <li><a href="doctor-panelpatientapproved.php"><i class="fas fa-calendar-check"></i> Approved Patients</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
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

        <!-- General Appointments Table -->
        <div class="main-table">
            <h2>General Appointments</h2>
            <div class="user-table">
                <table>
                    <thead>
                        <tr>
                            <th>Patient ID</th>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Number</th>
                            <th>Email</th>
                            <th>Symptoms</th>
                            <th>Report</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $j = "SELECT * FROM appointment WHERE status='approved' ORDER BY aid ASC";
                        $y = mysqli_query($con, $j);
                        while ($row = mysqli_fetch_array($y)) { ?>
                            <tr>
                                <td><?php echo $row['aid']; ?></td>
                                <td><?php echo $row['aname']; ?></td>
                                <td><?php echo $row['adob']; ?></td>
                                <td><?php echo $row['anumber']; ?></td>
                                <td><?php echo $row['aemail']; ?></td>
                                <td><?php echo $row['asymtoms']; ?></td>
                                <td><a href="treatment.php?repid=<?php echo $row['aid']; ?>" class="btn">Report</a></td>
                                <td><a href="?delid=<?php echo $row['aid']; ?>" class="btn">Delete</a></td>
                            </tr>
                        <?php } ?>

                        <?php
                        if (isset($_GET['delid'])) {
                            $sql = "DELETE FROM appointment WHERE aid='" . $_GET['delid'] . "'";
                            $qsql = mysqli_query($con, $sql);
                            if (mysqli_affected_rows($con) == 1) {
                                echo "<script>alert('Appointment record deleted successfully.');</script>";
                                echo "<script>window.location='doctor-panelpatientapproved.php'</script>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php mysqli_close($con); ?>

</body>
</html>
