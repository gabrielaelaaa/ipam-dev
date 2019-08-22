<!-- login process -->
<?php 
session_start();
include './koneksi.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
 // $username = 'admin';
 // $password = 'capmanran';

$query = mysqli_query($con, "select * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($query);
 
if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = 'login';
	// echo "lalal";
	header("location:../../tools.php");
}else{
	header("location:../../index.html");
}
$con->close();
?>