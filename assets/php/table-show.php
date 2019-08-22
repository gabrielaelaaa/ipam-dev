<?php
include 'koneksi.php';
$data = mysqli_query($con,"SELECT username,role FROM user");
while($row = mysqli_fetch_array($data)) {
echo "<tr><td>" . $row["username"] . "</td><td>" . $row["role"]. "</td></tr>";}
$con->close();
?>