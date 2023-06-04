<?php

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
	<title>Booking Ready | Rentso.</title>
	<?php include('templates/style.php'); ?>
</head>

<body>

	<!-- Start Switcher -->
	<?php include('templates/colorswitcher.php'); ?>
	<!-- /Switcher -->

	<!--Header-->
	<?php include('templates/header.php'); ?>

	<div>
		<br />
		<center>
			<h3>Konfirmasi Penyewaan</h3>
		</center>
		<hr>
	</div>

	<div class="container">
		<div class="col-md-6 col-sm-8">
			<div class="product-listing-img"><img src="<?= base_url('assets/'); ?>images/vehicleimages/<?= htmlentities($vehicle['image1']); ?>" class="img-responsive" alt="Image" /> </a> </div>
			<div class="product-listing-content">
				<h5><?= htmlentities($vehicle['nama_merek']); ?> <?= htmlentities($vehicle['nama_mobil']); ?></a></h5>
				<p class="list-price"><?= htmlentities(format_rupiah($vehicle['harga'])); ?> / Hari</p>
				<ul>
					<li><i class="fa fa-user" aria-hidden="true"></i><?= htmlentities($vehicle['seating']); ?> Seats</li>
					<li><i class="fa fa-calendar" aria-hidden="true"></i><?= htmlentities($vehicle['tahun']); ?> </li>
					<li><i class="fa fa-car" aria-hidden="true"></i><?= $this->ModelKendaraan->countUnit(['id_kendaraan' => $vehicle['id_mobil']]) ?> Unit</li>
				</ul>
			</div>
		</div>

		<div class="user_profile_info">
			<div class="col-md-12 col-sm-10">
				<form method="post" name="sewa">
					<input type="hidden" class="form-control" name="vid" value="<?= $vid; ?>" required>
					<input type="hidden" class="form-control" name="email" value="<?= $email; ?>" required>
					<div class="form-group">
						<label>Tanggal Mulai</label>
						<input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" value="<?= $mulai; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Tanggal Selesai</label>
						<input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" value="<?= $selesai; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Durasi</label>
						<input type="text" class="form-control" name="durasi" value="<?= $durasi; ?> Hari" readonly>
					</div>
					<div class="form-group">
						<label>Jumlah unit</label>
						<input type="text" class="form-control" name="unit" value="<?= $unit; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Biaya Mobil (<?= $durasi; ?> Hari x <?= $unit; ?> Unit)</label><br />
						<input type="text" class="form-control" name="biayamobil" value="<?= format_rupiah($totalmobil); ?>" readonly>
					</div>
					<div class="form-group">
						<label>Biaya Driver (<?= $durasi; ?> Hari x <?= $driver; ?> Driver)</label><br />
						<input type="hidden" class="form-control" name="biayadriver" value="<?= $drivercharges; ?>" readonly>
						<input type="text" class="form-control" name="driver" value="<?= format_rupiah($drivercharges); ?>" readonly>
					</div>
					<div class="form-group">
						<label>Total Biaya Sewa</label><br />
						<input type="text" class="form-control" name="total" value="<?= format_rupiah($totalsewa); ?>" readonly>
					</div>
					<br />
					<div class="form-group">
						<input type="submit" name="submit" value="Sewa" class="btn btn-block">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!--/my-vehicles-->
	<?php include('templates/footer.php'); ?>

	<?php include('templates/script.php'); ?>

	<?= $this->session->flashdata('booking'); ?>
</body>

</html>