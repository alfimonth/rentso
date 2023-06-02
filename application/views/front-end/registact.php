<?php
error_reporting(0);
include('templates/config.php');
$fname = $_POST['fullname'];
$email = $_POST['emailid'];
$mobile = $_POST['mobileno'];
$alamat = $_POST['alamat'];
$pass = $_POST['pass'];
$conf = $_POST['conf'];
$image1 = $_FILES["img1"]["name"];
$image2 = $_FILES["img2"]["name"];
$newimg1 = date('dmYHis') . $image1;
$newimg2 = date('dmYHis') . $image2;
move_uploaded_file($_FILES["img1"]["tmp_name"],  "assets/images/user/id/" . $newimg1);
move_uploaded_file($_FILES["img2"]["tmp_name"],  "assets/images/user/id/" . $newimg2);
if ($conf != $pass) {
	echo "<script>alert('Password tidak sama!');</script>";
	echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";
} else {
	$sqlcek = "SELECT email FROM users WHERE email='$email'";
	$querycek = mysqli_query($koneksidb, $sqlcek);
	if (mysqli_num_rows($querycek) > 0) {
		echo "<script>alert('Email sudah terdaftar, silahkan gunakan email lain!');</script>";
		echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";
	} else {
		$password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
		$sql1 = "INSERT INTO users(nama_user,email,telp,password,alamat,ktp,kk) VALUES('$fname','$email','$mobile','$password','$alamat','$newimg1','$newimg2')";
		$lastInsertId = mysqli_query($koneksidb, $sql1);
		if ($lastInsertId) {
			echo "<script>alert('Registrasi berhasil. Sekarang anda bisa login.');</script>";
			redirect('');
		} else {
			echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
			redirect('');
		}
	}
}
