<?php 

$connection = mysqli_connect("localhost", "root", "", "carecompass");
if (!$connection) {
	die("Connection failed: " . mysqli_connect_error());
}

	session_start();
	if(ISSET($_POST['login'])){
		$query = mysqli_query($connection, "SELECT * FROM appointment WHERE status='approved' AND `aname` = '$username' AND `adob` = '$password'");
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
		
		if($row > 0){
			$_SESSION['id']=$fetch['aid'];
			echo "<script>alert('Login Successfully!')</script>";
			echo "<script>window.location='view report.php'</script>";
		}else{
			echo "<script>alert('Invalid username or password/not approved')</script>";
			echo "<script>window.location='general report.php'</script>";
		}
		
	}
?>