
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
<div class="title">
        <h2 style=" font-size: larger;">Book Appointment</h2>
  <div class="left-appointment">
      <div class="row">
      <div class="col-md-6">
      <form method="post" action="book.php" name="registration" onsubmit="return formValidation()">
                        <label >Name</label>
                        <input type="hidden" placeholder="pid" name="pid" id="pid" value="<?php echo "".$fetch['pid']."";?>"> 
                        <input type="text" placeholder="Name" name="paname" id="name" value="<?php echo "".$fetch['pname']."";?>">  
                        <label >Gender</label>
                        <input type="text" placeholder="Enter Gender" name="pagender" id="gender">
                        <label >Date Of Birth</label>
                        <input type="date" name="padob" id="dob"  value="<?php echo "".$fetch['pdob']."";?>">
                        </div>
                    </div>
                       <div class="right-appointment">
                            <div class="col-md-6">
                        <label >Blood Group</label>
                        <input type="text" placeholder="+ve/-ve" name="pabg" id="bloodgrp">
                        <label >Contact Number</label>
                        <input type="text" placeholder="Enter number" name="panumber" id="number"  value="<?php echo "".$fetch['pnumber']."";?>">
                        <label >Address</label>
                        <input type="text" placeholder="Enter Address" name="paadd" id="address">
            </div>            
    </div>
</div>
<label >Symtoms/Reason</label>
<textarea rows="4"  name="appreason" id="appreason" ></textarea>
<input type="submit" class="btn btn-raised g-bg-cyan" name="submit" id="submit"  value="Submit" />

     <script>
    // Select all input elements for varification
const gender = document.getElementById("gender");
const bloodgrp = document.getElementById("bloodgrp");
const address = document.getElementById("address");
const reason = document.getElementById("appreason");
// function for form varification
function formValidation() {
  
  // checking name length
  if (gender.value=="") {
    alert("Please Enter Gender");
    gender.focus();
    return false;
  }

  // checking phone number
  else if (bloodgrp.value==""){
    alert("Enter Bloodgroup");
    bloodgrp.focus();
    return false;
  }
  // checking email
  else if (address.value==""){
    alert("Enter Address");
    address.focus();
    return false;
  }
  // checking specialization
  else if (appreason.value=="") {
    alert("Please enter your Reason");
    return false;
}
  return true;
}
  </script> 
     
    </form>
</body>
</html>