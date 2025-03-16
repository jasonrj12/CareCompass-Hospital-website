
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
   $query = mysqli_query($con, "SELECT * FROM `patient` WHERE `pid`='$_SESSION[id]'") or die(mysqli_error($con));
   $fetch = mysqli_fetch_array($query);
  ?>
        <h1>Hello <?php echo "".$fetch['pname']."";?></h1>
        <h5>Welcome to your panel</h5>

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
    <div class="info-card" >
        <div class="card"style="width:85%; margin-bottom:2rem;" >
            <div class="card-icon">
                <span>
                    <i class="fa fa-user"></i>
                </span>
            </div>
            <div class="card-detail">
                <h4>Name</h4>
                <h2><?php echo "".$fetch['pname']."";?></h2>
            </div>
          
        </div>
        <div class="card" style="width:85%; margin-bottom:2rem;">
            <div class="card-icon">
                <span>
                    <i class="fas fa-calendar"></i>
                </span>
            </div>
            <div class="card-detail">
                <h4>Date of birth</h4>
                <h2><?php echo "".$fetch['pdob']."";?></h2>
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
                <h2>Phone:<?php echo "".$fetch['pnumber']."";?></h2>
                <h2>Email:<?php echo "".$fetch['pemail']."";?></h2>
            </div>
        </div>
    </div>
    </div>
</div>





















</body>
</html>