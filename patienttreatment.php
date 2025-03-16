
<?php
$con=mysqli_connect("localhost","root","","carecompass");
if(!$con)
{
    echo"connection Error".mysqli_connect_error();
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
        <h5>Welcome to your panel</h5>
   $query = mysqli_query($con, "SELECT * FROM `patient` WHERE `pid`='$_SESSION[id]'") or die(mysqli_error($con));
   $fetch = mysqli_fetch_array($query);
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
    <div class="info-card" >
        <?php
   $query = mysqli_query($con, "SELECT * FROM `patientappointment` WHERE `pid`='$_SESSION[id]'") or die(mysqli_error($con));
   $fetch = mysqli_fetch_array($query);
  ?>
        <div class="card" style="width:85%; margin-bottom:2rem;">
            <div class="card-icon">
   $query = mysqli_query($con, "SELECT * FROM `patientappointment` WHERE `pid`='$_SESSION[id]'") or die(mysqli_error($con));
   $fetch = mysqli_fetch_array($query);
                </span>
            </div>
            <div class="card-detail">
                <h4>Your reason</h4>
               <h2><?php echo "".$fetch['preason']."";?></h2>
            </div>
         
        </div>
         <?php
   $query = mysqli_query($con, "SELECT * FROM `treatment` WHERE `pid`='$_SESSION[id]'") or die(mysqli_error($con));
   $fetch = mysqli_fetch_array($query);
  ?>
        <div class="card" style="width:85%; margin-bottom:2rem;">
            <div class="card-icon">
   $query = mysqli_query($con, "SELECT * FROM `treatment` WHERE `pid`='$_SESSION[id]'") or die(mysqli_error($con));
   $fetch = mysqli_fetch_array($query);
                </span>
            </div>
            <div class="card-detail">
                <h4>Treatment Report</h4>
                <h2><?php echo "".$fetch['treatmentdetails']."";?></h2>
                
            </div>
        </div>
    </div>
    </div>
</div>





















</body>
</html>