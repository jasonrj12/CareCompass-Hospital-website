
<?php
$con=mysqli_connect("localhost","root","","carecompass");
if(!$con)
{
    echo "Connection Error: " . mysqli_connect_error();
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
   $query = mysqli_query($con, "SELECT * FROM `doctor` WHERE `did`='$_SESSION[id]'") or die(mysqli_error($con));
   $fetch = mysqli_fetch_array($query);
  ?>
        <h1>Hello  Dr.<?php echo "".$fetch['dname']."";?></h1>
        <h5>Welcome to Doctor panel</h5>

    </div>
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
    <div class="info-card" >
        <div class="card"style="width:85%; margin-bottom:2rem;" >
            <div class="card-icon">
                <span>
                    <i class="fa fa-user"></i>
                </span>
            </div>
            <div class="card-detail">
                <h4>Dr.</h4>
                <h2><?php echo "".$fetch['dname']."";?></h2>
            </div>
          
        </div>
        <div class="card" style="width:85%; margin-bottom:2rem;">
            <div class="card-icon">
                <span>
                    <i class="fa fa-user-md"></i>
                </span>
            </div>
            <div class="card-detail">
                <h4>Doctor-Specialization</h4>
                <h2><?php echo "".$fetch['dspec']."";?></h2>
            </div>
         
        </div>
        <div class="card" style="width:85%; margin-bottom:2rem;">
            <div class="card-icon">
                <span>
                    <i class="fa fa-calendar-check"></i>
                </span>
            </div>
            <div class="card-detail">
                <h4>Hospital</h4>
                <h2><?php echo "".$fetch['hname']."";?></h2>
            </div>
           
        </div>
        <div class="card" style="width:85%; margin-bottom:2rem;">
            <div class="card-icon">
                <span>
                    <i class="fa fa-hospital-user"></i>
                </span>
            </div>
            <div class="card-detail">
                <h4>Other Details</h4>
                <h2>Phone:<?php echo "".$fetch['dphone']."";?></h2>
                <h2>Email:<?php echo "".$fetch['demail']."";?></h2>
            </div>
        </div>
    </div>
    </div>
</div>





















</body>
</html>