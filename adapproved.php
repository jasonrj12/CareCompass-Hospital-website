<?php 
$con = mysqli_connect("localhost", "root", "", "carecompass");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get data for appointments
$q = "SELECT * FROM appointment";
$r = mysqli_query($con, $q);
if (!$r) {
    die("Error in query: " . mysqli_error($con));
}
$n = mysqli_num_rows($r);

// Get data for doctors
$g = "SELECT * FROM doctor";
$t = mysqli_query($con, $g);
if (!$t) {
    die("Error in query: " . mysqli_error($con));
}
$l = mysqli_num_rows($t);

// Get data for patients
$h = "SELECT * FROM patient";
$k = mysqli_query($con, $h);
if (!$k) {
    die("Error in query: " . mysqli_error($con));
}
$p = mysqli_num_rows($k);

// Get data for feedback
$o = "SELECT * FROM Feedback";
$u = mysqli_query($con, $o);
if (!$u) {
    die("Error in query: " . mysqli_error($con));
}
$m = mysqli_num_rows($u);
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
    <div class="page_wrap">

    <!-- Sidebar -->
    <div class="side-bar">
        <div class="name-pos">
            <?php
            session_start();
            if (!isset($_SESSION['id'])) {
                // Redirect to login page or show an error
                die("Session expired. Please log in again.");
            }

            // Get admin info
            $query = mysqli_query($con, "SELECT * FROM `admin` WHERE `adname` = '$_SESSION[id]'") or die(mysqli_error($con));
            $fetch = mysqli_fetch_array($query);
            ?>
            <h1>Hello <?php echo $fetch['adname']; ?></h1>
            <h5>Welcome to admin panel</h5>
        </div>

        <div class="side-bar-nav">
            <ul>
                <li><a href="ad.php"><i class="fas fa-calendar"></i><span>Appointments</span></a></li>
                <li><a href="addoctor.php"><i class="fas fa-user-nurse"></i><span>Doctor</span></a></li>
                <li><a href="adpatient.php"><i class="fas fa-hospital-user"></i><span>Patient</span></a></li>
                <li><a href="adapproved.php"><i class="fas fa-calendar-check"></i><span>Approved</span></a></li>
                <li><a href="adfeedback.php"><i class="fas fa-address-card"></i><span>Feedback</span></a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="info-card">
            <div class="card">
                <div class="card-icon"><i class="fa fa-user"></i></div>
                <div class="card-detail">
                    <h4>Total Users</h4>
                    <h2><?php echo $n; ?></h2>
                </div>
                <p>Users</p>
            </div>
            <div class="card">
                <div class="card-icon"><i class="fa fa-user-md"></i></div>
                <div class="card-detail">
                    <h4>Total Doctors</h4>
                    <h2><?php echo $l; ?></h2>
                </div>
                <p>Doctors</p>
            </div>
            <div class="card">
                <div class="card-icon"><i class="fa fa-calendar-check"></i></div>
                <div class="card-detail">
                    <h4>Total Feedback</h4>
                    <h2><?php echo $m; ?></h2>
                </div>
                <p>Feedback</p>
            </div>
            <div class="card">
                <div class="card-icon"><i class="fa fa-hospital-user"></i></div>
                <div class="card-detail">
                    <h4>Total Appointments</h4>
                    <h2><?php echo $p; ?></h2>
                </div>
                <p>Appointments</p>
            </div>
        </div>

        <!-- General Appointments -->
        <div class="main-table">
            <div class="title"><h2>General Appointments</h2></div>
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
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $j = "SELECT * FROM appointment WHERE status='approved' ORDER BY aid ASC";
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
                            <td><a href="adapproved.php?delid=<?php echo $row['aid']; ?>" class="btn" style="background: linear-gradient(to left, #df4e55,#d10035);">Delete</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Delete Appointment -->
        <?php
        if (isset($_GET['delid'])) {
            $sql = "DELETE FROM appointment WHERE aid = '$_GET[delid]'";
            $qsql = mysqli_query($con, $sql);
            if (mysqli_affected_rows($con) == 1) {
                echo "<script>alert('Appointment record deleted successfully.');</script>";
                echo "<script>window.location='adapproved.php'</script>";
            }
        }
        ?>
    </div>
</div>

</body>
</html>
