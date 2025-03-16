<?php 
$con=mysqli_connect("localhost","root","","carecompass");
if(!$con)
{
        echo"connection Error".mysqli_connect_error();
}
	$username = $_POST['adname'];
        $password = $_POST['ademail'];
        $newpassword = $_POST['pnpass'];
        $result = mysqli_query($con, "SELECT password FROM admin WHERE adname ='$username'AND ademail ='$password' ");
        if(!$result)
        {
        echo "The username you entered does not exist";
        }
        $result = mysqli_query($con, "SELECT password FROM admin WHERE adname ='$username'AND ademail ='$password' ");
        {
        echo "You entered an correct password";
        }
        if($password == $_POST['ademail']) {
        } else if($password != mysqli_fetch_assoc($result)['password']) {
$sql=mysqli_query($con, "UPDATE admin SET adpass='$newpassword' where adname='$username'");
if($sql)
{
        echo "<script>alert('Password Updated')</script>";
        echo "<script>window.location='admin log-in.php'</script>";
}
else
{
        echo "<script>alert('Invalid password')</script>";
        echo "<script>window.location='forgotpassword3.php'</script>";
}
        }
?>