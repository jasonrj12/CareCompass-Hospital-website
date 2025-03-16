<?php 
$con=mysqli_connect("localhost","root","","carecompass");
if(!$con)
{
        echo "Connection Error: " . mysqli_connect_error();
}
	$username = $_POST['dname'];
        $password = $_POST['demail'];
        $newpassword = $_POST['pnpass'];
        $result = mysqli_query($con, "SELECT password FROM doctor WHERE dname ='$username'AND demail ='$password' ");
        if(!$result)
        {
        echo "The username you entered does not exist";
        }
        else {
            $row = mysqli_fetch_assoc($result);
            if ($password != $row['password'])
        {
        echo "You entered an correct password";
        }
        if($password=$_POST['demail'])
        $sql=mysqli_query($con, "UPDATE doctor SET dpass='$newpassword' where dname='$username'");
        if($sql)
        {
                echo "<script>alert('Password Updated')</script>";
                echo "<script>window.location='doctor login.php'</script>";
        }
       else
        {
                echo "<script>alert('Invalid password')</script>";
                echo "<script>window.location='forgotpassword2.php'</script>";
       }
    }

?>