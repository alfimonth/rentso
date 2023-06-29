<?php
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');

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

	<title>Rental Mobil | Admin Laporan</title>

	<?php include('includes/style.php') ?>
	<style>
		.errorWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #dd3d36;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}

		.succWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}
	</style>
	<script type="text/javascript">
		function valid() {
			if (document.laporan.akhir.value < document.laporan.awal.value) {
				alert("Tanggal akhir harus lebih besar dari tanggal awal!");
				return false;
			}
			return true;
		}
	</script>

</head>

<body>
	<?php include('includes/header.php'); ?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<h2 class="page-title">Laporan</h2>
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="get" name="laporan" onSubmit="return valid();">
							<div class="form-group">
								<div class="col-sm-4">
									<label>Tanggal Awal</label>
									<input type="date" class="form-control" name="awal" placeholder="From Date(dd/mm/yyyy)" required>
								</div>
								<div class="col-sm-4">
									<label>Tanggal Akhir</label>
									<input type="date" class="form-control" name="akhir" placeholder="To Date(dd/mm/yyyy)" required>
								</div>
								<div class="col-sm-4">
									<label>&nbsp;</label><br />
									<input type="submit" name="submit" value="Lihat Laporan" class="btn btn-primary">
								</div>
							</div>
						</form>
					</div>
				</div>
				<?php
				if (isset($_GET['submit'])) {
					$no = 0;
					$mulai 	 = $_GET['awal'];
					$selesai = $_GET['akhir'];
					$stt	 = "Sudah Dibayar";
					$sqlsewa = "SELECT booking.*,kendaraan.*,merek.*,users.* FROM booking,kendaraan,merek,users WHERE booking.id_mobil=kendaraan.id_mobil
											AND merek.id_merek=kendaraan.id_merek AND users.email=booking.email AND booking.status='$stt' 
											AND booking.tgl_booking BETWEEN '$mulai' AND '$selesai'";
					$querysewa = mysqli_query($koneksidb, $sqlsewa);
				?>
					<!-- Zero Configuration Table -->
					<div class="panel panel-default">
						<div class="panel-heading">Laporan Sewa Tanggal <?= IndonesiaTgl($mulai); ?> sampai <?= IndonesiaTgl($selesai); ?></div>
						<div class="panel-body">
							<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Sewa</th>
										<th>Tanggal Sewa</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<?php
									while ($result = mysqli_fetch_array($querysewa)) {
										$biayamobil = $result['durasi'] * $result['harga'];
										$total = $result['driver'] + $biayamobil;
										$no++;
									?>
										<tr>
											<td><?= $no; ?></td>
											<td><?= htmlentities($result['kode_booking']); ?></td>
											<td><?= IndonesiaTgl(htmlentities($result['tgl_booking'])); ?></td>
											<td><?= format_rupiah($total); ?></td>
										</tr>
									<?php }
									?>

								</tbody>
							</table>

						</div>
					</div>
					<form action="<?= base_url('admin/cetaklaporan') ?>" method="POST" name="cetak">
						<input type="hidden" name="mulai" value="<?= $mulai; ?>">
						<input type="hidden" name="selesai" value="<?= $selesai; ?>">
						<div class="form-group">
							<button type="submit" target="_blank" class="btn btn-primary">Cetak</button>
						</div>
					</form>
				<?php } ?>


			</div>
		</div>

	</div>
	</div>
	</div>

	<!-- Loading Scripts -->
	<?php include('includes/script.php') ?>

</body>

</html>