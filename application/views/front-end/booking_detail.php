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
	<title>Rental Mobill</title>
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
	$unit = $result['unit'];
	$totalmobil = $durasi * $harga * $unit;
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
					<form method="post" name="sewa" onSubmit="return valid();">
						<input type="hidden" class="form-control" name="vid" value="<?= $vid; ?>" required>
						<div class="form-group">
							<label>Kode Sewa</label>
							<input type="text" class="form-control" name="mobil" value="<?= $result['kode_booking']; ?>" readonly>
						</div>
						<input type="hidden" class="form-control" name="vid" value="<?= $vid; ?>" required>
						<div class="form-group">
							<label>Mobil</label>
							<input type="text" class="form-control" name="mobil" value="<?= $result['nama_merek'];
																						echo " ";
																						echo $result['nama_mobil']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Tanggal Mulai</label>
							<input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" value="<?= $result['tgl_mulai']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Tanggal Selesai</label>
							<input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" value="<?= $result['tgl_selesai']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Durasi</label>
							<input type="text" class="form-control" name="durasi" value="<?= $durasi; ?> Hari" readonly>
						</div>
						<div class="form-group">
							<label>Biaya Mobil (<?= $durasi; ?> Hari x <?= $unit; ?> Unit)</label><br />
							<input type="text" class="form-control" name="biayamobil" value="<?= format_rupiah($totalmobil); ?>" readonly>
						</div>
						<div class="form-group">
							<label>Biaya Driver (<?= $durasi; ?> Hari)</label><br />
							<input type="hidden" class="form-control" name="biayadriver" value="<?= $drivercharges; ?>" readonly>
							<input type="text" class="form-control" name="driver" value="<?= format_rupiah($drivercharges); ?>" readonly>
						</div>
						<div class="form-group">
							<label>Total Biaya Sewa</label><br />
							<input type="text" class="form-control" name="total" value="<?= format_rupiah($totalsewa); ?>" readonly>
						</div>
						<?php if ($result['status'] == "Menunggu Pembayaran") {
							$sqlrek 	= "SELECT * FROM tblpages WHERE id='5'";
							$queryrek = mysqli_query($koneksidb, $sqlrek);
							$resultrek = mysqli_fetch_array($queryrek);
						?>
							<b>*Silahkan transfer total biaya sewa ke <?= $resultrek['detail']; ?> maksimal tanggal <?= IndonesiaTgl($tglhasil); ?>.
							<?php
						} else {
						} ?>
							</b>
							<br /><br />
							<div class="form-group">
								<a href="<?= base_url('/user/cetak/') .  $kode; ?>" target="_blank" class="btn btn-primary btn-xs">Cetak</a>
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

	<?= $this->session->flashdata('booking'); ?>

</body>

</html>