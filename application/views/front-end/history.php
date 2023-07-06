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
	<title>Riwayat | Rentso.</title>
	<?php include('templates/style.php'); ?>
</head>

<body>

	<!-- Start Switcher -->
	<?php include('templates/colorswitcher.php'); ?>
	<!-- /Switcher -->

	<!--Header-->
	<?php include('templates/header.php'); ?>

	<?php
	// $sql1 	= "SELECT booking.*,kendaraan.*, merek.*, users.* FROM booking,kendaraan,merek,users WHERE booking.id_mobil=kendaraan.id_mobil 
	// 		AND merek.id_merek=kendaraan.id_merek and booking.email=users.email and booking.email='$email'";
	// $query1 = mysqli_query($koneksidb, $sql1);
	// $result = mysqli_fetch_array($query1);
	// $harga	= $result['harga'];
	// $durasi = $result['durasi'];
	// $totalmobil = $durasi * $harga;
	// $drivercharges = $result['driver'];
	// $totalsewa = $totalmobil + $drivercharges;
	// $tglmulai = strtotime($result['tgl_mulai']);
	// $jmlhari  = 86400 * 1;
	// $tgl	  = $tglmulai - $jmlhari;
	// $tglhasil = date("Y-m-d", $tgl);
	?>
	<br>
	<center>
		<h3>Riwayat Sewa</h3>
	</center>
	<hr>
	<div class="container">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th class="text-center" style="width: 100px;">Kode Sewa</th>
					<!-- <th>Nama Mobil</th>
						<th>Tgl. Mulai</th>
						<th>Tgl. Selesai</th>
						<th>Total Biaya</th> -->
					<th class="text-center">Status</th>
					<th class="text-center">Opsi</th>
				</tr>
			</thead>
			<?php
			$sql1 	= "SELECT booking.*,kendaraan.*, merek.*, users.* FROM booking,kendaraan,merek,users WHERE booking.id_mobil=kendaraan.id_mobil 
			AND merek.id_merek=kendaraan.id_merek and booking.email=users.email and booking.email='$email' ORDER BY booking.kode_booking DESC";
			$query1 = mysqli_query($koneksidb, $sql1);
			if (mysqli_num_rows($query1) != 0) {

				while ($result = mysqli_fetch_array($query1)) {
					$harga	= $result['harga'];
					$durasi = $result['durasi'];
					$totalmobil = $durasi * $harga;
					$drivercharges = $result['driver'];
					$totalsewa = $totalmobil + $drivercharges;
					$tglmulai = strtotime($result['tgl_mulai']);
					$jmlhari  = 86400 * 1;
					$tgl	  = $tglmulai - $jmlhari;
					$tglhasil = date("Y-m-d", $tgl);
					$nomor++;
			?>
					<tr>
						<td class="text-center"><?= $result['kode_booking']; ?></td>
						<!-- <td><?= $result['nama_merek'] . ' ' . $result['nama_mobil']; ?></td>
							<td><?= IndonesiaTgl($result['tgl_mulai']); ?></td>
							<td><?= IndonesiaTgl($result['tgl_selesai']); ?></td>
							<td><?= format_rupiah($totalsewa); ?></td> -->
						<td><?= $result['status']; ?></td>
						<td align="center">
							<?php if ($result['status'] == "Selesai") { ?>
								<a href="" class="fa fa-check" style="color: green;"></a>
								<?php } else {

								if ($result['status'] == "Sudah Dibayar") { ?>
									<a href="<?= base_url('/user/booking/') . $result['kode_booking']; ?>" class="glyphicon glyphicon-eye-open"></a>


								<?php } else {
								?>
									<a href="<?= base_url('/user/booking/') . $result['kode_booking']; ?>" class="glyphicon glyphicon-eye-open"></a>&nbsp;&nbsp;&nbsp;
									<a href="<?= base_url('/user/pembayaran/') . $result['kode_booking']; ?>" class="fa fa-upload"></a>
								<?php } ?>
						</td>
					</tr>
			<?php }
						} ?>

		<?php
			} else {
		?>
			<tr>
				<td colspan="11" align="center"><b>Belum ada riwayat sewa.</b></td>
			</tr>
		<?php } ?>
		</table>
	</div>
	<br>
	<br>
	<!--/my-vehicles-->
	<?php include('templates/footer.php'); ?>

	<?php include('templates/script.php'); ?>
	<?= $this->session->flashdata('bukti'); ?>
</body>

</html>