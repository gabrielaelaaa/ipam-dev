<!-- connecting to database -->
<?php 
$con=mysqli_connect("localhost:3306","root",""); //sesuaikan dengan password dan username mysql anda
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
mysqli_select_db($con,"ipam-dev"); //nama database yang kita gunakan
?>