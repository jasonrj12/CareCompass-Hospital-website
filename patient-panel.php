
<?php
$con=mysqli_connect("localhost","root","","carecompass");
if(!$con)
{
    echo"connection Error".mysqli_connect_error();
}
$q="SELECT * FROM appointment";
$r=mysqli_query($con, $q);
if(!$r)
{
    echo"error in query".mysqli_error($con);

}
$n=mysqli_num_rows($r);
?>
<?php
$g="SELECT * FROM doctor";
$t=mysqli_query($con, $g);
if(!$t)
{
    echo"error in query".mysqli_error($con);

}
$l=mysqli_num_rows($t);
?>
<?php
$h="SELECT * FROM patient";
$k=mysqli_query($con, $h);
if(!$k)
{
    echo"error in query".mysqli_error($con);

}
$p=mysqli_num_rows($k);
?>
<?php
$v=$n+$l+$p;
?>
<?php
$o="SELECT * FROM feedback";
$u=mysqli_query($con, $o);
if(!$u)
{
    echo"error in query".mysqli_error($con);

}
$m=mysqli_num_rows($u);
?>

<?php
while($row = mysqli_fetch_array($r)) {
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
</head>
<body>
    <div class="page_wrape">

    <!---sidebar-->
<div class="side-bar">

    <div class="name-pos">
    <?php
	session_start();
	if(!ISSET($_SESSION['id'])){
	}
  ?>
  <?php
   $query = mysqli_query($con, "SELECT * FROM `patient` WHERE `pid`='$_SESSION[id]'") or die(mysqli_error($con));
   $fetch = mysqli_fetch_array($query);
  ?>
        <h1>Hello <?php echo "".$fetch['pname']."";?></h1>
        <h5>Welcome to Your panel</h5>

    </div>
    <div class="side-bar-nav">
        <ul>
        <li>
                <a href="patient-profile.php">
                    <span><i class="fas fa-address-card"></i></span>
                    <span class="nav-link">Profile</span>
                    
                </a>
            </li>
        <li>
                <a href="patienttreatment.php">
                    <span><i class="fas fa-calendar"></i></span>
                    <span class="nav-link">Treatment</span>
                    
                </a>
            </li>
            <li>
                <a href="bookappointment.php">
                    <span><i class="fas fa-calendar"></i></span>
                    <span class="nav-link">Book 
                        Appointment</span>
                    
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <span><i class="fas fa-sign-out-alt"></i></span>
                    <span class="nav-link">Logout</span>
                    
                </a>
            </li>
           
        </ul>
    </div>
</div>
<!-----Main-content--->
<div class="main-content">
    <div class="info-card">
        <div class="card">
            <div class="card-icon">
                <span>
                    <i class="fa fa-user"></i>
                </span>
            </div>
            <div class="card-detail">
                <h4>Total Users</h4>
                <h2><?php echo"$v";?></h2>
            </div>
            <p>Users</p>
        </div>
        <div class="card">
            <div class="card-icon">
                <span>
                    <i class="fa fa-user-md"></i>
                </span>
            </div>
            <div class="card-detail">
                <h4>Total Doctor</h4>
                <h2><?php echo"$l";?></h2>
            </div>
            <p>Users</p>
        </div>
        <div class="card">
            <div class="card-icon">
                <span>
                    <i class="fa fa-calendar-check"></i>
                </span>
            </div>
            <div class="card-detail">
                <h4>Total Feedback</h4>
                <h2><?php echo"$m";?></h2>
            </div>
            <p>Users</p>
        </div>
        <div class="card">
            <div class="card-icon">
                <span>
                    <i class="fa fa-hospital-user"></i>
                </span>
            </div>
            <div class="card-detail">
                <h4>Total Appointment</h4>
                <h2><?php echo"$p";?></h2>
            </div>
            <p>Users</p>
        </div>
    </div>
    </div>
    <!----Generaal---->
    <div class="main-content">
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
                        <td>Patient-Systoms</td>
                        <td>Approve </td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                            $j="SELECT * FROM appointment WHERE status='approved' ORDER BY aid ASC";
                            $y=mysqli_query($con, $j);
                      ?>
                      <?php
                            while($row = mysqli_fetch_array($y)) {
                        ?>        
                    <tr>
                        <td><?php echo $row['aid'];?></td>
                        <td><?php echo $row['aname'];?></td>
                        <td><?php echo $row['adob'];?></td>
                        <td><?php echo $row['anumber'];?></td>
                        <td><?php echo $row['aemail'];?></td>
                        <td><?php echo $row['asymtoms'];?></td>
                        <td><a href="" class="btn">Approve</a></td>
                        <td><a href="" class="btn" style=" background: linear-gradient(to left, #df4e55,#d10035);">Delete</a></td>
                    </tr>
                        
                    <?php
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