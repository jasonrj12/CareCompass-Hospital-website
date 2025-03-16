<?php
$con=mysqli_connect("localhost","root","","carecompass");
if(!$con)
{
    echo"connection Error".mysqli_error($con);
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
$o="SELECT * FROM Feedback";
$u=mysqli_query($con, $o);
if(!$u)
{
    echo"error in query".mysqli_error($con);

}
$m=mysqli_num_rows($u);
?>

<?php
while($row = mysqli_fetch_array($r)) {
    // Process the row if needed
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
        header('location:login.php');
    }
    $query = mysqli_query($con, "SELECT * FROM `doctor` WHERE `did`='$_SESSION[id]'") or die(mysqli_error($con));
    $fetch = mysqli_fetch_array($query);
?>
        <h1>Hello <?php echo $fetch['dname'];?></h1>
        <h5>Welcome to Doctor panel</h5>
    <div class="side-bar-nav">
    <ul>
        <li>
                <a href="doctor-profile.php">
                    <span><i class="fas fa-address-card"></i></span>
                    <span class="nav-link">Profile</span>
                    
                </a>
            </li>
        <li>
                <a href="doctor-panel.php">
                    <span><i class="fas fa-calendar"></i></span>
                    <span class="nav-link">Appointments</span>
                    
                </a>
            </li>
            <li>
                <a href="doctor-panelpatient.php">
                    <span><i class="fas fa-hospital-user"></i></span>
                    <span class="nav-link">Patient</span>
                    
                </a>
            </li>
           
            <li>
            <a href="doctor-panelpatientapproved.php">
                    <span><i class="fas fa-calendar-check"></i></span>
                    <span class="nav-link">Approved Patients</span>
                   
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
  
<!----Patient--->
<div class="main-content">
    <div class="main-table">
        <div class="title">
        <h2>Patient</h2>
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
                        <td>Approve </td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <tbody>
                <?php
               
               $j="SELECT * FROM patient WHERE status='pending' ORDER BY pid ASC";
               $y=mysqli_query($con, $j);
               ?>
              
         <?php
               while($row = mysqli_fetch_array($y)) {
       ?>
       <tr>
           <td><?php echo $row['pid'];?></td>
           <td><?php echo $row['pname'];?></td>
           <td><?php echo $row['pdob'];?></td>
           <td><?php echo $row['pnumber'];?></td>
           <td><?php echo $row['pemail'];?></td>
           <td><?php echo $row['page'];?></td>
           <td><?php echo "<a href=doctor-panelpatient.php?editid=$row[pid]  class='btn btn-raised g-bg-cyan'>Approve </a>";?></td>
           <td><?php echo "<a href=doctor-panelpatient.php?delid=$row[pid] class='btn' style=' background: linear-gradient(to left, #df4e55,#d10035);'>Delete</a>";?></td>
       </tr>
       <?php
                      }
                        ?>
                        <?php
                        if(isset($_GET['editid'])) {
                            $select="UPDATE patient SET status='approved' WHERE pid = '$_GET[editid]' ";
                            $result=mysqli_query($con, $select); 
                          if(mysqli_affected_rows($con) == 1)
                            {
                                echo "<script>alert('appointment record Approved successfully..');</script>";
                                echo "<script>window.location='doctor-panelpatient.php'</script>";
                            }
                        }
                        ?>
                    
                        <?php
                       if(isset($_GET['delid']))
                       {
                           $sql ="DELETE FROM patient WHERE pid='$_GET[delid]'";
                           $qsql=mysqli_query($con, $sql);
                           if(mysqli_affected_rows($con) == 1) {
                               echo "<script>alert('appointment record deleted successfully..');</script>";
                               echo "<script>window.location='doctor-panelpatient.php'</script>";
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