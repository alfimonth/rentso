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
					<h5><?= htmlentities($vehicle['nama_merek']); ?> , <?= htmlentities($vehicle['nama_mobil']); ?></a></h5>
					<p class="list-price"><?= htmlentities(format_rupiah($vehicle['harga'])); ?> / Hari</p>
					<ul>
						<li><i class="fa fa-user" aria-hidden="true"></i><?= htmlentities($vehicle['seating']); ?> Seats</li>
						<li><i class="fa fa-calendar" aria-hidden="true"></i><?= htmlentities($vehicle['tahun']); ?> </li>
						<li><i class="fa fa-car" aria-hidden="true"></i><?= htmlentities($vehicle['bb']); ?></li>
					</ul>
				</div>
			</div>

			<div class="user_profile_info">
				<div class="col-md-12 col-sm-10">
					<form method="post" name="sewa" >
						<input type="hidden" class="form-control" name="vid" value="<?= $id; ?>" required>
						<div class="form-group">
							<label>Tanggal Mulai</label>
							<input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
							<input type="hidden" name="now" class="form-control" value="<?= $now; ?>">
						</div>
						<div class="form-group">
							<label>Tanggal Selesai</label>
							<input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
						</div>
						<div class="form-group">
							<label>Metode Pickup</label><br />
							<select class="form-control" name="pickup" required>
								<option value="">== Metode Pickup ==</option>
								<option value="Ambil Sendiri">Ambil Sendiri</option>
								<option value="Pickup Sesuai Alamat">Pickup Sesuai Alamat</option>
							</select>
						</div>
						<div class="form-group">
							<label>Driver</label><br />
							<input type="radio" name="driver" value="1" checked> Ya &nbsp;
							<input type="radio" name="driver" value="0"> Tidak
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