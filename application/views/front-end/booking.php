<?php
error_reporting(0);
include('templates/config.php');
include('templates/format_rupiah.php');

?>
<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<title>Booking | Rentso.</title>
	<?php include('templates/style.php'); ?>
</head>

<body>

	<!-- Start Switcher -->
	<?php include('templates/colorswitcher.php'); ?>
	<!-- /Switcher -->

	<!--Header-->
	<?php include('templates/header.php'); ?>
	<!--Page Header-->
	<!-- /Header -->

	<section class="user_profile inner_pages">
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
					<form method="post" name="sewa" action="<?= base_url('kendaraan/booking/') . $id; ?>">
						<input type="hidden" class="form-control" name="vid" value="<?= $id; ?>" required>
						<div class="form-group">
							<?php $fromv = (set_value('fromdate') === '') ? date('Y-m-d', strtotime('+1 day')) : set_value('fromdate'); ?>
							<label>Tanggal Mulai</label>
							<input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" value="<?= $fromv ?>" required>
							<input type="hidden" name="now" class="form-control" value="<?= $now; ?>">
						</div>
						<div class="form-group">
							<?php
							if (set_value('todate') === '') {
								$tov = date('Y-m-d', strtotime('+1 day'));
							} else {
								$tov = set_value('todate');
							}
							?>
							<label>Tanggal Selesai</label>
							<input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" value="<?= $tov ?>" required>
						</div>
						<div class=" form-group">
							<label>Jumlah unit</label><br />
							<?php
							if (set_value('unit') === '') {
								$unitv = 1;
							} else {
								$unitv = set_value('unit');
							}
							?>
							<input type="number" class="form-control" name="unit" value="<?= $unitv; ?>" min="1" max="<?= $this->ModelKendaraan->countUnit(['id_kendaraan' => $vehicle['id_mobil']]) ?>" required>
						</div>
						<div class="form-group">
							<label>Sewa Driver</label><br />

							<?php
							if (set_value('driver') === '') {
								$driverv = 0;
							} else {
								$driverv = set_value('driver');
							}
							?>
							<input type="number" class="form-control" name="driver" value="<?= $driverv ?>" min="0" max="<?= $this->ModelKendaraan->countUnit(['id_kendaraan' => $vehicle['id_mobil']]) ?>" required>
						</div>
						<br />
						<div class="form-group">
							<input type="submit" name="submit" value="Cek Ketersediaan" class="btn btn-block">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--/my-vehicles-->
	<?php include('templates/footer.php'); ?>

	<?php include('templates/script.php'); ?>

	<?= $this->session->flashdata('booking'); ?>
</body>

</html>