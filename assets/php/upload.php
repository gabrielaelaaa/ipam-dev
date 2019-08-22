<?php 
include 'koneksi.php';
include "excel_reader2.php";
?>
 
<?php
// upload file xls
$target = basename($_FILES['importfile']['name']) ;
move_uploaded_file($_FILES['importfile']['tmp_name'], $target);
 
// beri permisi agar file xls dapat di baca
chmod($_FILES['importfile']['name'],0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['importfile']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);
 
// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
 
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$username     = $data->val($i, 1);
	$password   = $data->val($i, 2);
	$role  = $data->val($i, 3);
 	echo $username;
	if($username != "" && $password != "" && $role != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($con,"INSERT into user values('$username','$password','$role')");
		$berhasil++;
	}
}
 
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['importfile']['username']);
 
// alihkan halaman ke index.php
header("location:../../subnet.php");
$con->close();
?>