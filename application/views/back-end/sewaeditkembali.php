<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
if(strlen($_SESSION['alogin'])==0){	
header('location:index.php');
}else{
	if(isset($_POST['submit'])){
		$status = $_POST['status'];
		$kode = $_POST['id'];
		$mySql	= "UPDATE booking SET status = '$status' WHERE kode_booking='$kode'";
		$myQry	= mysqli_query($koneksidb, $mySql);
		$mySql1	= "UPDATE cek_booking SET status = '$status' WHERE kode_booking='$kode'";
		$myQry1	= mysqli_query($koneksidb, $mySql1);
		echo "<script type='text/javascript'>
				alert('Status berhasil diupdate.'); 
				document.location = 'sewa_kembali.php'; 
			</script>";
	}else {
	}
	

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Mutiara Motor Car Rental Portal | Admin Edit Sewa Mobil</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Pengembalian Mobil</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Info Penyewa</div>
									<div class="panel-body">
										<?php 
										$id=$_GET['id'];
										$sqlsewa = "SELECT booking.*,mobil.*,merek.*,users.* FROM booking,mobil,merek,users WHERE booking.id_mobil=mobil.id_mobil
													AND merek.id_merek=mobil.id_merek AND users.email=booking.email AND booking.kode_booking ='$id'";
										$querysewa = mysqli_query($koneksidb,$sqlsewa);
										$result = mysqli_fetch_array($querysewa);
										$biayamobil=$result['durasi']*$result['harga'];
										$total = $result['driver']+$biayamobil;
										?>

										<form method="post" class="form-horizontal" name="theform" enctype="multipart/form-data">
										<div class="form-group">
											<label class="col-sm-2 control-label">Kode Sewa</label>
											<div class="col-sm-4">
												<input type="text" name="id" class="form-control" value="<?php echo $id;?>" required readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Status<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<select class="form-control" name="status" required>
														<?php
															$stt = $result['status'];
															echo "<option value='$stt' selected>".strtoupper($stt)."</option>";
															echo "<option value='Selesai'>".strtoupper("Selesai")."</option>";
														?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Penyewa</label>
											<div class="col-sm-4">
												<input type="text" name="penyewa" class="form-control" value="<?php echo $result['nama_user'];?>" required readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Telepon</label>
											<div class="col-sm-4">
												<input type="text" name="telp" class="form-control" value="<?php echo $result['telp'];?>" required readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Alamat</label>
											<div class="col-sm-4">
												<textarea col="5" name="alamat" class="form-control" readonly><?php echo $result['alamat'];?></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Bukti Bayar</label>
											<div class="col-sm-4">
												<a href="../image/bukti/<?php echo $result['bukti_bayar'];?>" target="_blank"><img src="../image/bukti/<?php echo $result['bukti_bayar'];?>" width="150" height="150"></a>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-3">
												<div class="checkbox checkbox-inline">
													<button class="btn btn-primary" type="submit" name="submit" style="margin-top:4%">Save changes</button>
												</div>
											</div>
										</div>
										</form>
									</div>
								</div>
							</div>
						</div>
				
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Detail Sewa</div>
										<div class="panel-body">
										<form>
											<div class="form-group">
												<label class="col-sm-2 control-label">Mobil</label>
												<div class="col-sm-4">
													<input type="text" name="namamobil" class="form-control" value="<?php echo $result['nama_mobil'];?>" required readonly>
												</div>
											</div>
											<br/>
											<div class="form-group">
												<label class="col-sm-2 control-label">Biaya Driver</label>
												<div class="col-sm-4">
													<input type="text" name="driver" class="form-control" value="<?php echo format_rupiah($result['driver']);?>" required readonly>
												</div>
											</div>
											<br/>
											<div class="form-group">
												<label class="col-sm-2 control-label">Tanggal Mulai</label>
												<div class="col-sm-4">
													<input type="text" name="mulai" class="form-control" value="<?php echo IndonesiaTgl($result['tgl_mulai']);?>" required readonly>
												</div>
											</div>
											<br/>
											<div class="form-group">
												<label class="col-sm-2 control-label">Biaya Mobil</label>
												<div class="col-sm-4">
													<input type="text" name="biayamobil" class="form-control" value="<?php echo format_rupiah($biayamobil);?>" required readonly>
												</div>
											</div>
											<br/>
											<div class="form-group">
												<label class="col-sm-2 control-label">Tanggal Selesai</label>
												<div class="col-sm-4">
													<input type="text" name="selesai" class="form-control" value="<?php echo IndonesiaTgl($result['tgl_selesai']);?>" required readonly>
												</div>
											</div>
											<br/>
											<div class="form-group">
												<label class="col-sm-2 control-label">Total Biaya</label>
												<div class="col-sm-4">
													<input type="text" name="total" class="form-control" value="<?php echo format_rupiah($total);?>" required readonly>
												</div>
											</div>
											<br/>
											<div class="form-group">
												<label class="col-sm-2 control-label">Durasi</label>
												<div class="col-sm-4">
													<input type="text" name="durasi" class="form-control" value="<?php echo $result['durasi'];?>" required readonly>
												</div>
											</div>
											</form>
									</div>
								</div>
							</div>
						</div>
				
					</div>
				</div>
			<!-- COntainer Fluid-->			
			</div>
		</div>
	</div>
</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>