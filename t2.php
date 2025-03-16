
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
     <form method="post" action="treat.php" name="form" onSubmit="return validateform()">
    <div class="page_wrape">
<?php
     if(isset($_GET['rep1id']))
  {
   $query = mysqli_query($con, "SELECT * FROM `patientappointment`  WHERE pid = '$_GET[rep1id]'") or die(mysqli_error($con));
   $fetch = mysqli_fetch_array($query);
  }
   ?>
<!-----Main-content--->
   $query = mysqli_query($con, "SELECT * FROM `patientappointment`  WHERE pid = '$_GET[rep1id]'") or die(mysqli_error($con));
   $fetch = mysqli_fetch_array($query);
     </div>
        <h2 style=" font-size: larger;text-align: center;font-size:45px;">Treatment Panel</h2>
     
                             
<div class="info-card">
    <div class="card" style="width:95%;padding:5px;">
    <h4 style="text-align: center;font-size:30px;">Patient Details</h4>
            <div class="card-detail" style="display:inline-block;  justify-content: space-between;margin-left:10rem;">
             
                <h2 style="font-size:17px;">Patient-id:  <?php echo "".$fetch['pid']."";?></h2>
                <h2 style="font-size:17px;">Patient-name:  <?php echo "".$fetch['pname']."";?></h2>
                 <h2 style="font-size:17px;">Patient-dob:  <?php echo "".$fetch['pdob']."";?></h2>
                <h2 style="font-size:17px;">Patient-Number:  <?php echo "".$fetch['pnumber']."";?></h2>
                 <h2 style="font-size:17px;">Patient-Gender:  <?php echo "".$fetch['pgender']."";?></h2>
                <h2 style="font-size:17px;">Patient-Systoms:  <?php echo "".$fetch['preason']."";?></h2>
            </div>
        </div>
        <label >Treatment</label>
<textarea rows="4"  name=treatment id="appreason" ></textarea>
 <input type="hidden" placeholder="pid" name="pid" id="pid" value="<?php echo "".$fetch['pid']."";?>"> 
<input type="submit" class="btn btn-raised g-bg-cyan" name="submit" id="submit" value="Submit"  style='  cursor: pointer;  width:95%; text-align:center; color: white; font-weight: 500; margin: 8px 0; padding: .5rem;  display: inline-block;    border: 1px solid #ccc;   box-shadow: 5px 5px 5px #ccc;   border-radius:.3rem;
    background-image:linear-gradient(to right, #e93187, #eb0f51);'>
    </div>
</div>   </form>
</body>
</html>