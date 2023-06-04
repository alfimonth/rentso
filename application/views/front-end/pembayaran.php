<?php
error_reporting(0);
include('templates/config.php');
include('templates/format_rupiah.php');
include('templates/library.php');
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<title> | Rentso.</title>
	<?php include('templates/style.php'); ?>
</head>

<body>

	<!-- Start Switcher -->
	<?php include('templates/colorswitcher.php'); ?>
	<!-- /Switcher -->

	<!--Header-->
	<?php include('templates/header.php'); ?>

	<?php
	$sql1 	= "SELECT booking.*,kendaraan.*, merek.* FROM booking,kendaraan,merek WHERE booking.id_mobil=kendaraan.id_mobil AND merek.id_merek=kendaraan.id_merek and booking.kode_booking='$kode'";
	$query1 = mysqli_query($koneksidb, $sql1);
	$result = mysqli_fetch_array($query1);
	$harga	= $result['harga'];
	$durasi = $result['durasi'];
	$totalmobil = $durasi * $harga;
	$drivercharges = $result['driver'];
	$totalsewa = $totalmobil + $drivercharges;
	$tglmulai = strtotime($result['tgl_mulai']);
	$jmlhari  = 86400 * 1;
	$tgl	  = $tglmulai - $jmlhari;
	$tglhasil = date("Y-m-d", $tgl);
	?>
	<section class="user_profile inner_pages">
		<center>
			<h3>Detail Sewa</h3>
		</center>
		<div class="container">
			<div class="user_profile_info">
				<div class="col-md-12 col-sm-10">
					<form method="post" action="<?= base_url('user/bukti')?>" name="sewa" onSubmit="return valid();" enctype="multipart/form-data">
						<input type="hidden" class="form-control" name="vid" value="<?php echo $vid; ?>" required>
						<div class="form-group">
							<label>Kode Sewa</label>
							<input type="text" class="form-control" name="kode" value="<?php echo $result['kode_booking']; ?>" readonly>
						</div>
						<input type="hidden" class="form-control" name="vid" value="<?php echo $vid; ?>" required>
						<div class="form-group">
							<label>Mobil</label>
							<input type="text" class="form-control" name="mobil" value="<?php echo $result['nama_merek'];
																						echo ", ";
																						echo $result['nama_mobil']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Tanggal Mulai</label>
							<input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" value="<?php echo $result['tgl_mulai']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Tanggal Selesai</label>
							<input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" value="<?php echo $result['tgl_selesai']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Durasi</label>
							<input type="text" class="form-control" name="durasi" value="<?php echo $durasi; ?> Hari" readonly>
						</div>
						<div class="form-group">
							<label>Biaya Mobil (<?php echo $durasi; ?> Hari)</label><br />
							<input type="text" class="form-control" name="biayamobil" value="<?php echo format_rupiah($totalmobil); ?>" readonly>
						</div>
						<div class="form-group">
							<label>Biaya Driver (<?php echo $durasi; ?> Hari)</label><br />
							<input type="hidden" class="form-control" name="biayadriver" value="<?php echo $drivercharges; ?>" readonly>
							<input type="text" class="form-control" name="driver" value="<?php echo format_rupiah($drivercharges); ?>" readonly>
						</div>
						<div class="form-group">
							<label>Total Biaya Sewa (<?php echo $durasi; ?> Hari)</label><br />
							<input type="text" class="form-control" name="total" value="<?php echo format_rupiah($totalsewa); ?>" readonly>
						</div>
						<div class="form-group">
							<label>Upload Bukti Pembayaran</label><br />
							<input type="file" class="form-control" name="img1" accept="image/*" required>
						</div>
						<div class="hr-dashed"></div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit" name="submit">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--/my-vehicles-->
	<?php include('templates/footer.php'); ?>

	<!-- Scripts -->
	<?php include('templates/script.php'); ?>
</body>

</html>