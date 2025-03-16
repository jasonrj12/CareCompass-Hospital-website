
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
     <form method="post" action="logout.php" name="form" onSubmit="return validateform()">
    <div class="page_wrape">
  
  <?php
	session_start();
	if(!ISSET($_SESSION['id'])){
	}
?>
  <?php
   $query = mysqli_query($con, "SELECT * FROM `treatment` WHERE `pid`='$_SESSION[id]'") or die(mysqli_error($con));
   $fetch = mysqli_fetch_array($query);
  ?>
<!-----Main-content--->
<div class="content" style="padding: 10px; ">
$query = mysqli_query($con, "SELECT * FROM `treatment` WHERE `pid`='$_SESSION[id]'") or die(mysqli_error($con));
$fetch = mysqli_fetch_array($query);
        <h2 style=" font-size: larger;text-align: center;font-size:45px;">Report Panel</h2>
     
                             
<div class="info-card">
    <div class="card" style="width:95%;padding:5px;">
    <h4 style="text-align: center;font-size:30px;">Patient Report</h4>
            <div class="card-detail" style="display:inline-block;  justify-content: space-between;margin-left:10rem;">
             
                <h2 style="font-size:17px;">Patient-id:  <?php echo "".$fetch['pid']."";?></h2>
                <h2 style="font-size:17px;">Patient-name:  <?php echo "".$fetch['treatmentdetails']."";?></h2>
            </div>
        </div>
<input type="submit" class="btn btn-raised g-bg-cyan" name="submit" id="submit" value="Return to Home page"  style='  cursor: pointer;  width:95%; text-align:center; color: white; font-weight: 500; margin: 8px 0; padding: .5rem;  display: inline-block;    border: 1px solid #ccc;   box-shadow: 5px 5px 5px #ccc;   border-radius:.3rem;
    background-image:linear-gradient(to right, #e93187, #eb0f51);'>
    </div>
</div>

    </form>
</body>
</html>