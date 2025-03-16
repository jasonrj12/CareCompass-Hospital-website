<?php 
$con=mysqli_connect("localhost","root","","carecompass");
if(!$con)
{
        echo"connection Error".mysqli_connect_error();
}

        $username = $_POST['pname'];
        $password = $_POST['pdob'];
        $newpassword = $_POST['pnpass'];
        $result = mysqli_query($con, "SELECT password FROM patient WHERE pname ='$username' AND pdob ='$password' ");
        if(!$result)
        {
        echo "The username you entered does not exist";
        }
        else if($password!= mysqli_fetch_assoc($result)['password'])
        {
        echo "You entered an correct password";
        }
        if($password=$_POST['pdob'])
        $sql=mysqli_query($con, "UPDATE patient SET ppass='$newpassword' where pname='$username'");
        if($sql)
        {
                echo "<script>alert('Password Updated')</script>";
                echo "<script>window.location='Patient Login.php'</script>";
        }
       else
        {
                echo "<script>alert('Invalid password')</script>";
                echo "<script>window.location='forgotpassword.php'</script>";
       }
      ?>