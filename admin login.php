<?php 

$connection = mysqli_connect("localhost", "root", "", "carecompass");
if (!$connection) {
	die("Connection failed: " . mysqli_connect_error());
}

	session_start();
	if(ISSET($_POST['login'])){
		$username = $_POST['adname'];
		$password = $_POST['adpass'];
	
		$query = mysqli_query($connection, "SELECT * FROM `admin` WHERE `adname` = '$username' AND `adpass` = '$password' ") or die(mysqli_error($connection));
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
		
		if($row > 0){
			$_SESSION['id']=$fetch['adname'];
			echo "<script>alert('Login Successfully!')</script>";
			echo "<script>window.location='ad.php'</script>";
		}else{
			echo "<script>alert('Invalid username or password')</script>";
			echo "<script>window.location='admin log-in.php'</script>";
		}
		
	}
?>