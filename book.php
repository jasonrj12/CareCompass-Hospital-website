<?php
$con=mysqli_connect("localhost","root","","carecompass");
if(!$con)
{
	echo"connection Error".mysqli_connect_error();	
}
	$f=$_REQUEST['pid'];
	$mi=$_REQUEST['paname'];
	$e=$_REQUEST['pagender'];
	$y=$_REQUEST['padob'];
	$p=$_REQUEST['pabg'];	
	$b=$_REQUEST['panumber'];
 	   $k=$_REQUEST['paadd'];
   $h=$_REQUEST['appreason'];

	
$q="INSERT INTO patientappointment(pid,pname,pgender,pdob,pbloodgroup,pnumber ,paddress,preason)VALUES('$f','$mi','$e','$y','$p','$b','$k','$h')";
$r=mysqli_query($con, $q);
if($r)
{
	echo "<script>alert('Appointment record inserted successfully...');</script>";
	echo "<script>window.location='bookappointment.php'</script>";
}
else
{
	echo "Error: " . mysqli_error($con);
}
mysqli_close($con);
?>
