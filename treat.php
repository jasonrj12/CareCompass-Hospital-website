<?php
$con=mysqli_connect("localhost","root","","carecompass");
if(!$con)
{
	echo"connection Error".mysqli_connect_error();	
}
	$f=$_REQUEST['pid'];
	$mi=$_REQUEST['treatment'];

	
$q="INSERT INTO treatment(pid,treatmentdetails)VALUES('$f','$mi')";
$r=mysqli_query($con, $q);
if($r)
{
	echo "<script>alert('Treatment record inserted successfully...');</script>";
	echo "<script>window.location='doctor-panelpatientapproved.php'</script>";
}
else
{
	echo "Error: " . mysqli_error($con);
}
mysqli_close($con);
