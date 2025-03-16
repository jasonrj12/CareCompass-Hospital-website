<?php 

$connection = mysqli_connect("localhost", "root", "", "carecompass");
if (!$connection) {
	die("Connection failed: " . mysqli_connect_error());
}

	session_start();
	if(ISSET($_POST['login'])){
		$username = $_POST['dname'];
		$query = mysqli_query($connection, "SELECT * FROM `doctor` WHERE status='approved' AND `dname` = '$username' AND `dpass` = '$password' ") or die(mysqli_error($connection));
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
		
		if($row > 0){
			$_SESSION['id']=$fetch['did'];
			echo "<script>alert('Login Successfully!')</script>";
			echo "<script>window.location='doctor-panel.php'</script>";
		}else{
			echo "<script>alert('Invalid username or password')</script>";
			echo "<script>window.location='doctor login.php'</script>";
		}
		
	}
?>