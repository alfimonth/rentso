<?php
include('includes/config.php');
$brand	= $_POST['brand'];
$sql 	= "INSERT INTO merek (nama_merek) VALUES ('$brand')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'merek.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'tambahmerek.php'; 
		</script>";

}
?>