<?php
$con=mysqli_connect("localhost","root","","carecompass");
if(!$con)
{
	echo "Connection Error: " . mysqli_connect_error();
}
	$f=$_REQUEST['pname'];
	$mi=$_REQUEST['pnumber'];
	$e=$_REQUEST['pemail'];
	$y=$_REQUEST['pdob'];
	$p=$_REQUEST['page'];	
	$b=$_REQUEST['ppass'];

	
$q="INSERT INTO patient(pname,pnumber,pemail,pdob,page,ppass,status)VALUES('$f','$mi','$e','$y','$p','$b','pending')";
$r=mysqli_query($con, $q);
if($r)
{
	echo "<script>alert('Registration Successfully!')</script>";
	echo "<script>window.location='patient Login.php'</script>";
}
else
{
	echo "Error: " . mysqli_error($con);
}
mysqli_close($con);
?>
