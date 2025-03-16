<?php
$con=mysqli_connect("localhost","root","","carecompass");
if(!$con)
{
	echo"connection Error".mysqli_connect_error();	
}
	$f=$_REQUEST['adname'];
	$mi=$_REQUEST['adphone'];
	$e=$_REQUEST['ademail'];
	$y=$_REQUEST['adpass'];
	
	
$q="INSERT INTO admin(adname,adphone,ademail,adpass)VALUES('$f','$mi','$e','$y')";
$r=mysqli_query($con, $q);
if($r)
{
	echo "<script>alert('Registered Successfully!')</script>";
	echo "<script>window.location='admin log-in.php'</script>";
}
else
{
	echo"Error".mysqli_error($con);
}
mysqli_close($con);
?>