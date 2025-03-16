<?php
session_start();

// Database Connection
$con = mysqli_connect("localhost", "root", "", "carecompass");
if (!$con) {
    die("Connection Error: " . mysqli_connect_error());
}

// Fetch Total Appointments
$q = "SELECT * FROM appointment";
$r = mysqli_query($con, $q);
if (!$r) {
    die("Error in query: " . mysqli_error($con));
}
$n = mysqli_num_rows($r);

// Fetch Total Doctors
$g = "SELECT * FROM doctor";
$t = mysqli_query($con, $g);
if (!$t) {
    die("Error in query: " . mysqli_error($con));
}
$l = mysqli_num_rows($t);

// Fetch Total Patients
$h = "SELECT * FROM patient";
$k = mysqli_query($con, $h);
if (!$k) {
    die("Error in query: " . mysqli_error($con));
}
$p = mysqli_num_rows($k);

// Fetch Total Feedbacks
$o = "SELECT * FROM feedback";
$u = mysqli_query($con, $o);
if (!$u) {
    die("Error in query: " . mysqli_error($con));
}
$m = mysqli_num_rows($u);

// Total Users
$v = $n + $l + $p;

// Fetch Admin Data
if (isset($_SESSION['id'])) {
    $admin_id = $_SESSION['id'];
    $query = mysqli_query($con, "SELECT * FROM admin WHERE adname='$admin_id'");
    if ($query) {
        $fetch = mysqli_fetch_assoc($query);
    } else {
        die("Error fetching admin data: " . mysqli_error($con));
    }
}
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
                <?php if (isset($_SESSION['id'])): ?>
                    <h1>Hello <?php echo $fetch['adname']; ?></h1>
                    <h5>Welcome to admin panel</h5>
                <?php endif; ?>
            </div>

            <div class="side-bar-nav">
                <ul>
                    <li><a href="ad.php"><span><i class="fas fa-calendar"></i></span> Appointments</a></li>
                    <li><a href="addoctor.php"><span><i class="fas fa-user-nurse"></i></span> Doctor</a></li>
                    <li><a href="adpatient.php"><span><i class="fas fa-hospital-user"></i></span> Patient</a></li>
                    <li><a href="adapproved.php"><span><i class="fas fa-calendar-check"></i></span> Approved</a></li>
                    <li><a href="adfeedback.php"><span><i class="fas fa-address-card"></i></span> Feedback</a></li>
                    <li><a href="logout.php"><span><i class="fas fa-sign-out-alt"></i></span> Logout</a></li>
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
                        <h2><?php echo $v; ?></h2>
                    </div>
                </div>

                <div class="card">
                    <div class="card-icon"><i class="fa fa-user-md"></i></div>
                    <div class="card-detail">
                        <h4>Total Doctors</h4>
                        <h2><?php echo $l; ?></h2>
                    </div>
                </div>

                <div class="card">
                    <div class="card-icon"><i class="fa fa-calendar-check"></i></div>
                    <div class="card-detail">
                        <h4>Total Feedback</h4>
                        <h2><?php echo $m; ?></h2>
                    </div>
                </div>

                <div class="card">
                    <div class="card-icon"><i class="fa fa-hospital-user"></i></div>
                    <div class="card-detail">
                        <h4>Total Appointments</h4>
                        <h2><?php echo $p; ?></h2>
                    </div>
                </div>
            </div>

            <!-- Feedback Table -->
            <div class="main-table">
                <div class="title">
                    <h2>Feedback</h2>
                </div>
                <div class="user-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Patient Name</th>
                                <th>Patient Email</th>
                                <th>Patient Age</th>
                                <th>Ans1</th>
                                <th>Ans2</th>
                                <th>Ans3</th>
                                <th>Ans4</th>
                                <th>Feedback</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $feedback_query = "SELECT * FROM feedback";
                            $feedback_result = mysqli_query($con, $feedback_query);
                            while ($row = mysqli_fetch_assoc($feedback_result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['femail']; ?></td>
                                    <td><?php echo $row['fage']; ?></td>
                                    <td><?php echo $row['ans1']; ?></td>
                                    <td><?php echo $row['ans2']; ?></td>
                                    <td><?php echo $row['ans3']; ?></td>
                                    <td><?php echo $row['ans4']; ?></td>
                                    <td><?php echo $row['feed']; ?></td>
                                    <td>
    <a href="adfeedback.php?delid=<?php echo isset($row['fid']) ? htmlspecialchars($row['fid']) : ''; ?>" 
       class="btn" 
       style="background: linear-gradient(to left, #df4e55, #d10035);">
       Delete
    </a>
</td>
                            <?php } ?>

                            <?php
                            if (isset($_GET['delid']) && !empty($_GET['delid'])) {
                                $delid = mysqli_real_escape_string($con, $_GET['delid']);
                                $sql = "DELETE FROM feedback WHERE fid='$delid'";
                                $qsql = mysqli_query($con, $sql);
                                if (mysqli_affected_rows($con) == 1) {
                                    echo "<script>alert('Feedback record deleted successfully.');</script>";
                                    echo "<script>window.location='adfeedback.php'</script>";
                                } else {
                                    echo "<script>alert('Failed to delete feedback record.');</script>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
